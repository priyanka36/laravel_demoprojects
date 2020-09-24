<?php

Route::get('/', 'Backend\Authentication\AuthenticationController@loginPage')->name('login');
Route::post('verify-login', 'Backend\Authentication\AuthenticationController@verifyLogin')->name('verify-login');
Route::get('log-out', 'Backend\Authentication\AuthenticationController@logout')->name('log-out');


Route::group(['middleware' => 'auth'], function () {

    Route::prefix('backend')->group(function () {
        Route::get('dashboard', 'Backend\Authentication\AuthenticationController@dashboard')->name('dashboard');


        // slider route start
        Route::get('slider/list', 'Backend\SliderController@sliderList')->name('backend.sliderList');
        Route::get('slider/create', 'Backend\SliderController@sliderCreate')->name('backend.sliderCreate');
        Route::post('slider/store', 'Backend\SliderController@sliderStore')->name('backend.sliderStore');
        Route::get('slider/edit/{slider}', 'Backend\SliderController@editSliderDetail')->name('backend.editSliderDetail');
        Route::put('slider/update/{slider}', 'Backend\SliderController@updateSliderDetail')->name('backend.updateSliderDetail');
        Route::get('slider/delete/{id}', 'Backend\SliderController@deleteSlider');
        Route::post('slider/position-change', 'Backend\SliderController@changePosition');
        Route::post('slider/change-status', 'Backend\SliderController@sliderChangeStatus')->name('backend.sliderChangeStatus');

        // slider route end



        //homepage route start
        Route::get('homepage/list', 'Backend\HomepageController@homepageList')->name('backend.homepageList');
        Route::get('homepage/create', 'Backend\HomepageController@homepageCreate')->name('backend.homepageCreate');
        Route::post('homepage/store', 'Backend\HomepageController@homepageStore')->name('backend.homepageStore');
        Route::get('homepage/edit/{homepage}', 'Backend\HomepageController@editHomepageDetail')->name('backend.editHomepageDetail');
        Route::post('homepage/update/{homepage}', 'Backend\HomepageController@updateHomepageDetail')->name('backend.updateHomepageDetail');
        Route::get('homepage/delete/{id}', 'Backend\HomepageController@deleteHomepage');
        Route::post('homepage/position-change', 'Backend\HomepageController@changePosition');
        Route::post('homepage/change-status', 'Backend\HomepageController@homepageChangeStatus')->name('backend.homepageChangeStatus');




        //homepage route end

        //introduction route starts

        Route::get('introduction/list', 'Backend\IntroductionController@introductionList')->name('backend.introductionList');
        Route::get('introduction/create', 'Backend\IntroductionController@introductionCreate')->name('backend.introductionCreate');
        Route::post('introduction/store', 'Backend\IntroductionController@introductionStore')->name('backend.introductionStore');
        Route::get('introduction/edit/{introduction}', 'Backend\IntroductionController@editIntroductionDetail')->name('backend.editIntroductionDetail');
        Route::post('introduction/update/{introduction}', 'Backend\IntroductionController@updateIntroductionDetail')->name('backend.updateIntroductionDetail');
        Route::get('introduction/delete/{id}', 'Backend\IntroductionController@deleteIntroduction');
        Route::post('introduction/position-change', 'Backend\IntroductionController@changePosition');
        Route::post('introduction/change-status', 'Backend\IntroductionController@introductionChangeStatus')->name('backend.introductionChangeStatus');
        Route::get('dashboard', 'Backend\Authentication\AuthenticationController@dashboard')->name('dashboard');
//introduction route ends



        //team route starts

        Route::get('team/list', 'Backend\TeamController@index')->name('backend.teamList');
        Route::get('team/create', 'Backend\TeamController@teamCreate')->name('backend.teamCreate');
        Route::post('team/store', 'Backend\TeamController@teamStore')->name('backend.teamStore');
        Route::get('team/edit/{team}', 'Backend\TeamController@editTeamDetail')->name('backend.editTeamDetail');
        Route::post('team/update/{team}', 'Backend\TeamController@updateTeamDetail')->name('backend.updateTeamDetail');
        Route::get('team/delete/{id}', 'Backend\TeamController@deleteTeam');
        Route::post('team/position-change', 'Backend\TeamController@changePosition');
        Route::post('team/change-status', 'Backend\TeamController@teamChangeStatus')->name('backend.teamChangeStatus');
        Route::get('dashboard', 'Backend\Authentication\AuthenticationController@dashboard')->name('dashboard');
//team route ends

        //bod route starts

        Route::get('bod/list', 'Backend\BodController@bodList')->name('backend.bodList');
        Route::get('bod/create', 'Backend\BodController@bodCreate')->name('backend.bodCreate');
        Route::post('bod/store', 'Backend\BodController@bodStore')->name('backend.bodStore');
        Route::get('bod/edit/{bod}', 'Backend\BodController@editBodDetail')->name('backend.editBodDetail');
        Route::post('bod/update/{bod}', 'Backend\BodController@updateBodDetail')->name('backend.updateBodDetail');
        Route::get('bod/delete/{id}', 'Backend\BodController@deleteBod');
        Route::post('bod/position-change', 'Backend\BodController@changePosition');
        Route::post('bod/change-status', 'Backend\BodController@bodChangeStatus')->name('backend.bodChangeStatus');
        //Route::get('dashboard', 'Backend\Authentication\AuthenticationController@dashboard')->name('dashboard');
//bod route ends

        //career route starts

        Route::get('career/list', 'Backend\CareerController@careerList')->name('backend.careerList');
        Route::get('career/create', 'Backend\CareerController@careerCreate')->name('backend.careerCreate');
        Route::post('career/store', 'Backend\CareerController@careerStore')->name('backend.careerStore');
        Route::get('career/edit/{career}', 'Backend\CareerController@editCareerDetail')->name('backend.editCareerDetail');
        Route::post('career/update/{career}', 'Backend\CareerController@updateCareerDetail')->name('backend.updateCareerDetail');
        Route::get('career/delete/{id}', 'Backend\CareerController@deleteCareer');
        Route::post('career/position-change', 'Backend\CareerController@changePosition');
        Route::post('career/change-status', 'Backend\CareerController@careerChangeStatus')->name('backend.careerChangeStatus');
        //Route::get('dashboard', 'Backend\Authentication\AuthenticationController@dashboard')->name('dashboard');
//career route ends
        //enroll route starts

        Route::get('enroll/list', 'Backend\EnrollController@enrollList')->name('backend.enrollList');
        Route::get('enroll/create', 'Backend\EnrollController@enrollCreate')->name('backend.enrollCreate');
        Route::post('enroll/store', 'Backend\EnrollController@enrollStore')->name('backend.enrollStore');
        Route::get('enroll/edit/{enroll}', 'Backend\EnrollController@editEnrollDetail')->name('backend.editEnrollDetail');
        Route::post('enroll/update/{enroll}', 'Backend\EnrollController@updateEnrollDetail')->name('backend.updateEnrollDetail');
        Route::get('enroll/delete/{id}', 'Backend\EnrollController@deleteEnroll');
        Route::post('enroll/position-change', 'Backend\EnrollController@changePosition');
        Route::post('enroll/change-status', 'Backend\EnrollController@enrollChangeStatus')->name('backend.enrollChangeStatus');

//enroll route ends
        //event route starts

        Route::get('event/list', 'Backend\EventController@eventList')->name('backend.eventList');
        Route::get('event/create', 'Backend\EventController@eventCreate')->name('backend.eventCreate');
        Route::post('event/store', 'Backend\EventController@eventStore')->name('backend.eventStore');
        Route::get('event/edit/{event}', 'Backend\EventController@editEventDetail')->name('backend.editEventDetail');
        Route::post('event/update/{event}', 'Backend\EventController@updateEventDetail')->name('backend.updateEventDetail');
        Route::get('event/delete/{id}', 'Backend\EventController@deleteEvent');
        Route::post('event/position-change', 'Backend\EventController@changePosition');
        Route::post('event/change-status', 'Backend\EventController@eventChangeStatus')->name('backend.eventChangeStatus');

//event route ends


        //rum route starts

        Route::get('rum/list', 'Backend\RumController@rumList')->name('backend.rumList');
        Route::get('rum/create', 'Backend\RumController@rumCreate')->name('backend.rumCreate');
        Route::post('rum/store', 'Backend\RumController@rumStore')->name('backend.rumStore');
        Route::get('rum/edit/{rum}', 'Backend\RumController@editRumDetail')->name('backend.editRumDetail');
        Route::post('rum/update/{rum}', 'Backend\RumController@updateRumDetail')->name('backend.updateRumDetail');
        Route::get('rum/delete/{id}', 'Backend\RumController@deleteRum');
        Route::post('rum/position-change', 'Backend\RumController@changePosition');
        Route::post('rum/change-status', 'Backend\RumController@rumChangeStatus')->name('backend.rumChangeStatus');

//rum route ends



        //Whisky route starts

        Route::get('whisky/list', 'Backend\WhiskyController@whiskyList')->name('backend.whiskyList');
        Route::get('whisky/create', 'Backend\WhiskyController@whiskyCreate')->name('backend.whiskyCreate');
        Route::post('whisky/store', 'Backend\WhiskyController@whiskyStore')->name('backend.whiskyStore');
        Route::get('whisky/edit/{whisky}', 'Backend\WhiskyController@editWhiskyDetail')->name('backend.editWhiskyDetail');
        Route::post('whisky/update/{whisky}', 'Backend\WhiskyController@updateWhiskyDetail')->name('backend.updateWhiskyDetail');
        Route::get('whisky/delete/{id}', 'Backend\WhiskyController@deleteWhisky');
        Route::post('whisky/position-change', 'Backend\WhiskyController@changePosition');
        Route::post('whisky/change-status', 'Backend\WhiskyController@whiskyChangeStatus')->name('backend.whiskyChangeStatus');

//Whisky route ends



        //vodka route starts

        Route::get('vodka/list', 'Backend\VodkaController@vodkaList')->name('backend.vodkaList');
        Route::get('vodka/create', 'Backend\VodkaController@vodkaCreate')->name('backend.vodkaCreate');
        Route::post('vodka/store', 'Backend\VodkaController@vodkaStore')->name('backend.vodkaStore');
        Route::get('vodka/edit/{vodka}', 'Backend\VodkaController@editVodkaDetail')->name('backend.editVodkaDetail');
        Route::post('vodka/update/{vodka}', 'Backend\VodkaController@updateVodkaDetail')->name('backend.updateVodkaDetail');
        Route::get('vodka/delete/{id}', 'Backend\VodkaController@deleteVodka');
        Route::post('vodka/position-change', 'Backend\VodkaController@changePosition');
        Route::post('vodka/change-status', 'Backend\VodkaController@vodkaChangeStatus')->name('backend.vodkaChangeStatus');

//vodka route ends



        //gin route starts

        Route::get('gin/list', 'Backend\GinController@ginList')->name('backend.ginList');
        Route::get('gin/create', 'Backend\GinController@ginCreate')->name('backend.ginCreate');
        Route::post('gin/store', 'Backend\GinController@ginStore')->name('backend.ginStore');
        Route::get('gin/edit/{gin}', 'Backend\GinController@editGinDetail')->name('backend.editGinDetail');
        Route::post('gin/update/{gin}', 'Backend\GinController@updateGinDetail')->name('backend.updateGinDetail');
        Route::get('gin/delete/{id}', 'Backend\GinController@deleteGin');
        Route::post('gin/position-change', 'Backend\GinController@changePosition');
        Route::post('gin/change-status', 'Backend\GinController@ginChangeStatus')->name('backend.ginChangeStatus');

//gin route ends









    });
});
Route::get('send', 'MailController@send');
Route::get('pay', 'PayOrderController@store');



Route::get('load-template', function() {
    return view('master-layouts.frontend.homepage');
});


//frontend route starts

Route::get('/home','Frontend\HomePageController@index');
Route::get('/about','Frontend\IntroductionController@index');
Route::get('/team','Frontend\TeamController@index');
Route::get('/bod','Frontend\BodController@index');
//Route::get('/homepage','Frontend\HomePageController@homepage');




