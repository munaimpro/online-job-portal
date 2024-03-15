<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\SiteMenu;
use Illuminate\Http\Request;
use App\Models\SiteInformation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class SettingsInformationController extends Controller
{
    public function systemSettings(){
        $siteInformationData = SiteInformation::first();
        $siteMenuData = SiteMenu::orderBy('id', 'desc')->get();
        return view('backend.pages.settings.system.system_settings', compact('siteInformationData', 'siteMenuData'));
    }


    // Logo update process
    public function updateSystemInformation(Request $request){
        try {

            $logo = $request->file('logo');

            if ($logo && $logo->isValid()) {
                // Processing image file
                $existingLogo = SiteInformation::where('logo', '!=', NULL)->first();
                if ($existingLogo) {
                    $logoPath = public_path($existingLogo->logo);
                    if (File::exists($logoPath)) {
                        File::delete($logoPath);
                    }
                }

                $getLogoFileName = uniqid() . '_' . time() . '.' . $logo->getClientOriginalExtension();
                $logoPath = 'assets/img/settings/' . $getLogoFileName;
                $logo->move(public_path('assets/img/settings/'), $getLogoFileName);

                // Update title & logo path in database
                $result = SiteInformation::where('id', '=', 1)->update(['title' => $request->input('title'), 'logo' => $logoPath]);

                if ($result !== false) {
                    return redirect()->back()->with('SiteInfoSuccessMsg', 'Information updated successfully');
                } else {
                    return redirect()->back()->with('SiteInfoErrorMsg', 'Failed to update information');
                }
            } else{
                // Update title in database
                $result = SiteInformation::where('id', '=', 1)->update(['title' => $request->input('title')]);

                if ($result !== false) {
                    return redirect()->back()->with('SiteInfoSuccessMsg', 'Title updated successfully');
                } else {
                    return redirect()->back()->with('SiteInfoErrorMsg', 'Failed to update title');
                }
            }
        } catch (Exception $e) {
            return redirect()->back()->with('SiteInfoErrorMsg', 'Something went wrong');
        }
    }


    // Menu delete process
    public function deleteSystemMenu($id){
        $menuDelete = SiteMenu::where('id', $id)->delete();
        if($menuDelete){
            return redirect()->back()->with('systemMenuSuccessMsg', 'Menu deleted successfully');
        } else{
            return redirect()->back()->with('systemMenuErrorMsg', 'Something went wrong');
        }
    }

    // Menu update process
    public function updateSystemMenu(Request $request, $id){
        try{
            $systemMenu = SiteMenu::findOrFail($id);

            $updateMenu = $systemMenu->update([
                'navigation_menu_name' => $request->input('menu_name'),
                'navigation_menu_link' => $request->input('menu_link')
            ]);

            if($updateMenu){
                return redirect()->back()->with('systemMenuSuccessMsg', 'Menu updated successfully');
            } else{
                return redirect()->back()->with('systemMenuErrorMsg', 'Menu could not be updated');
            }
        } catch(Exception $e){
            return redirect()->back()->with('systemMenuErrorMsg', 'Something went wrong');
        }
    }

    // Menu create process
    public function createSystemMenu(Request $request){
        try{
            $existedMenu = SiteMenu::where('navigation_menu_name', '=', $request->input('menu_name'))->first();

            if($existedMenu){
                return redirect()->back()->with('systemMenuErrorMsg', 'This menu is already created');
            } else{
                $createMenu = SiteMenu::create([
                    'navigation_menu_name' => $request->input('menu_name'),
                    'navigation_menu_link' => $request->input('menu_link')
                ]);

                if($createMenu){
                    return redirect()->back()->with('systemMenuSuccessMsg', 'New menu created');
                } else{
                    return redirect()->back()->with('systemMenuErrorMsg', 'Menu could not be created');
                }
            }
        } catch(Exception $e){
            return redirect()->back()->with('systemMenuErrorMsg', 'Something went wrong');
        }
    }
}
