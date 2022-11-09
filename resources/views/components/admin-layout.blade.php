<!DOCTYPE html>
<!-- saved from url=(0051)https://coderthemes.com/hyper_2/saas/index-rtl.html -->
<html lang="en" dir="rtl" data-theme="light" data-layout-mode="fluid"
 data-topbar-color="light" data-sidenav-size="default" data-sidenav-color="dark" 
 data-layout-position="fixed">
 <x-admin-header></x-admin-header>

 <body>
    <!-- Begin page -->
    <div class="wrapper">
     <x-admin-nav></x-admin-nav>
    <x-admin-menu></x-admin-menu>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

            {{$slot}}

            </div>
        </div>
    </div>



            <!-- Theme Settings -->
            <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
                <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                    <h5 class="text-white m-0">Theme Settings</h5>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
    
                <div class="offcanvas-body p-0">
                    <div data-simplebar="init" class="h-100"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="left: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                        <div class="card mb-0 p-3">
                            <h5 class="mt-0 font-16 fw-bold mb-3">Choose Layout</h5>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
                                        <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Vertical</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
                                        <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 align-items-center border-bottom">
                                                    <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                    <span class="d-block border border-3 ms-auto"></span>
                                                    <span class="d-block border border-3 ms-1"></span>
                                                    <span class="d-block border border-3 ms-1"></span>
                                                    <span class="d-block border border-3 ms-1"></span>
                                                </span>
                                                <span class="bg-light d-block p-1"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Horizontal</h5>
                                </div>
                            </div>
    
                            <h5 class="my-3 font-16 fw-bold">Color Scheme</h5>
    
                            <div class="colorscheme-cardradio">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check card-radio">
                                            <input class="form-check-input" type="radio" name="data-theme" id="layout-color-light" value="light">
                                            <label class="form-check-label p-0 avatar-md w-100" for="layout-color-light">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column bg-white">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                    </div>
    
                                    <div class="col-4">
                                        <div class="form-check card-radio">
                                            <input class="form-check-input" type="radio" name="data-theme" id="layout-color-dark" value="dark">
                                            <label class="form-check-label p-0 avatar-md w-100 bg-black" for="layout-color-dark">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light-lighten d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light-lighten d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                    </div>
                                </div>
                            </div>
    
                            <div id="layout-width">
                                <h5 class="my-3 font-16 fw-bold">Layout Mode</h5>
    
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check card-radio">
                                            <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                                            <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-fluid">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                                    </div>
                                    <div class="col-4" id="layout-boxed">
                                        <div class="form-check card-radio">
                                            <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                                            <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-mode-boxed">
                                                <span class="d-flex h-100 border-start border-end">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end flex-column p-1">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                    </div>
    
                                    <div class="col-4" id="layout-detached">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-layout-mode" id="data-layout-detached" value="detached">
                                            <label class="form-check-label p-0 avatar-md w-100" for="data-layout-detached">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-flex p-1 align-items-center border-bottom">
                                                        <span class="d-block p-1 bg-dark-lighten rounded me-1"></span>
                                                        <span class="d-block border border-3 ms-auto"></span>
                                                        <span class="d-block border border-3 ms-1"></span>
                                                        <span class="d-block border border-3 ms-1"></span>
                                                        <span class="d-block border border-3 ms-1"></span>
                                                    </span>
                                                    <span class="d-flex h-100 p-1 px-2">
                                                        <span class="flex-shrink-0">
                                                            <span class="bg-light d-flex h-100 flex-column p-1 px-2">
                                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                                <span class="d-block border border-3 w-100 mb-1"></span>
                                                                <span class="d-block border border-3 w-100"></span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                                </span>
    
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Detached</h5>
                                    </div>
                                </div>
                            </div>
    
                            <h5 class="my-3 font-16 fw-bold">Topbar Color</h5>
    
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                            <span class="d-flex h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                        <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                        <span class="d-block border border-3 w-100 mb-1"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-dark d-block p-1"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                            </div>
    
                            <div id="sidebar-color">
                                <h5 class="my-3 font-16 fw-bold">Sidebar Color</h5>
    
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-color" id="leftbar-color-light" value="light">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-light">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-color" id="leftbar-color-dark" value="dark">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-dark">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-dark d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-color" id="leftbar-color-default" value="default">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-color-default">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-primary bg-gradient d-flex h-100 flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-light-lighten rounded mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                            <span class="d-block border opacity-25 border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Brand</h5>
                                    </div>
                                </div>
                            </div>
    
                            <div id="sidebar-size">
                                <h5 class="my-3 font-16 fw-bold">Sidebar Size</h5>
    
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-default">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                                    </div>
    
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-compact">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                                            <span class="d-block p-1 bg-dark-lighten rounded mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                                    </div>
    
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end  flex-column">
                                                            <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                                    </div>
    
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-small-hover" value="sm-hover">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-small-hover">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 border-end  flex-column">
                                                            <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                            <span class="d-block border border-3 w-100 mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Hover View</h5>
                                    </div>
    
                                    <div class="col-4">
                                        <div class="form-check sidebar-setting card-radio">
                                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                            <label class="form-check-label p-0 avatar-md w-100" for="leftbar-size-full">
                                                <span class="d-flex h-100">
                                                    <span class="flex-shrink-0">
                                                        <span class="d-flex h-100 border-end  flex-column">
                                                            <span class="d-block p-1 bg-dark-lighten mb-1"></span>
                                                        </span>
                                                    </span>
                                                    <span class="flex-grow-1">
                                                        <span class="d-flex h-100 flex-column">
                                                            <span class="bg-light d-block p-1"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                                    </div>
                                </div>
                            </div>
    
                            <div id="layout-position">
                                <h5 class="my-3 font-16 fw-bold">Layout Position</h5>
    
                                <div class="btn-group radio" role="group">
                                    <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                                    <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>
    
                                    <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                                    <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                                </div>
                            </div>
    
                            <div id="sidebar-user">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <label class="font-16 fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check">
                                    </div>  
                                </div>
                            </div>
    
                        </div>
                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 1335px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 103px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
    
                </div>
                <div class="offcanvas-footer border-top p-3 text-center">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>        
            
            <!-- Vendor js -->
            <script src="{{asset('Dashboard/vendor.min.js')}}"></script>
    
            <!-- Daterangepicker js -->
            <script src="{{asset('Dashboard/moment.min.js')}}"></script>
            <script src="{{asset('Dashboard/daterangepicker.js')}}"></script>
            
            <!-- Apex Charts js -->
            <script src="{{asset('Dashboard/apexcharts.min.js')}}"></script>
    
            <!-- Vector Map js -->
            <script src="{{asset('Dashboard/jquery-jvectormap-1.2.2.min.js')}}"></script>
            <script src="{{asset('Dashboard/jquery-jvectormap-world-mill-en.js')}}"></script>
    
            <!-- Dashboard App js -->
            <script src="{{asset('Dashboard/demo.dashboard.js')}}"></script>
    
            <!-- App js -->
            <script src="{{asset('Dashboard/app.js')}}"></script>
    
        
     <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg><div class="daterangepicker ltr single opensright"><div class="ranges"></div><div class="drp-calendar left single" style="display: block;"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right" style="display: none;"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div></div><div class="jvectormap-label"></div>


 </body>

</html>
