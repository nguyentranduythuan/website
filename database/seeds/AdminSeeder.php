<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('admin_users')->truncate();
        
        App\Models\AdminUser::create(
        	array('username'=>'admin',
                   'group_id'=>'1',
                   'password'=>Hash::make("code2020"),
                   'fullname'=>'Administrator',
                   'permissions'=>'',
                   'is_active'=>'1'));
        
                   
        // MENU
        DB::table('admin_menus')->truncate();

        //1
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Dashboard',
        //            'parent_id'=>'0',
        //            'model'=>'dashboard',
        //            'controller'=>'HomeController',
        //            'link'=>'dashboard/lists',
        //            'p_order'=>'0',
        //            'is_active'=>'1')
        // );

        //2
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Permissions',
        //            'parent_id'=>'0',
        //            'model'=>'permissions',
        //            'controller'=>'PermissionsController',
        //            'link'=>'permissions/lists',
        //            'p_order'=>'1',
        //            'is_active'=>'1')
        // );

        DB::table('admin_menus')->insert(
              array('name'=>'Banner',
                   'parent_id'=>'0',
                   'model'=>'banners',
                   'controller'=>'BannerController',
                   'link'=>'banners/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        );

        DB::table('admin_menus')->insert(
              array('name'=>'About 1',
                   'parent_id'=>'0',
                   'model'=>'about-us',
                   'controller'=>'AboutController',
                   'link'=>'about-us/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        );

        //3 // Tin tuc
        DB::table('admin_menus')->insert(
              array('name'=>'About 2',
                   'parent_id'=>'0',
                   'model'=>'about-info',
                   'controller'=>'NULL',
                   'link'=>'#',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //4
        DB::table('admin_menus')->insert(
              array('name'=>'About Tittle',
                   'parent_id'=>'3',
                   'model'=>'about-title',
                   'controller'=>'AboutTitleController',
                   'link'=>'about-title/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //5
        DB::table('admin_menus')->insert(
              array('name'=>'About Content',
                   'parent_id'=>'3',
                   'model'=>'about-content',
                   'controller'=>'AboutContentController',
                   'link'=>'about-content/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

        DB::table('admin_menus')->insert(
              array('name'=>'About 3',
                   'parent_id'=>'0',
                   'model'=>'company-info',
                   'controller'=>'NULL',
                   'link'=>'#',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //4
        DB::table('admin_menus')->insert(
              array('name'=>'Company Tittle',
                   'parent_id'=>'6',
                   'model'=>'company-title',
                   'controller'=>'CompanyTitleController',
                   'link'=>'company-title/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //5
        DB::table('admin_menus')->insert(
              array('name'=>'Company Content',
                   'parent_id'=>'6',
                   'model'=>'company-content',
                   'controller'=>'CompanyContentController',
                   'link'=>'company-content/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

        DB::table('admin_menus')->insert(
              array('name'=>'About 4',
                   'parent_id'=>'0',
                   'model'=>'company-info',
                   'controller'=>'NULL',
                   'link'=>'#',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //4
        DB::table('admin_menus')->insert(
              array('name'=>'Achievement Tittle',
                   'parent_id'=>'9',
                   'model'=>'achievement-title',
                   'controller'=>'AchievementTitleController',
                   'link'=>'achievement-title/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //5
        DB::table('admin_menus')->insert(
              array('name'=>'Achievement Content',
                   'parent_id'=>'9',
                   'model'=>'achievement-content',
                   'controller'=>'AchievementContentController',
                   'link'=>'achievement-content/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

        DB::table('admin_menus')->insert(
              array('name'=>'About 5',
                   'parent_id'=>'0',
                   'model'=>'company-info',
                   'controller'=>'NULL',
                   'link'=>'#',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //4
        DB::table('admin_menus')->insert(
              array('name'=>'Tittle',
                   'parent_id'=>'12',
                   'model'=>'job-title',
                   'controller'=>'JobTitleController',
                   'link'=>'job-title/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //5
        DB::table('admin_menus')->insert(
              array('name'=>'Content',
                   'parent_id'=>'12',
                   'model'=>'job-content',
                   'controller'=>'JobContentController',
                   'link'=>'job-content/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

         DB::table('admin_menus')->insert(
              array('name'=>'About 6',
                   'parent_id'=>'0',
                   'model'=>'company-info',
                   'controller'=>'NULL',
                   'link'=>'#',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //4
        DB::table('admin_menus')->insert(
              array('name'=>'Tittle',
                   'parent_id'=>'15',
                   'model'=>'benefit-title',
                   'controller'=>'BenefitTitleController',
                   'link'=>'benefit-title/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //5
        DB::table('admin_menus')->insert(
              array('name'=>'Content',
                   'parent_id'=>'15',
                   'model'=>'benefit-content',
                   'controller'=>'BenefitContentController',
                   'link'=>'benefit-content/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

        DB::table('admin_menus')->insert(
              array('name'=>'Service',
                   'parent_id'=>'0',
                   'model'=>'company-info',
                   'controller'=>'NULL',
                   'link'=>'#',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //4
        DB::table('admin_menus')->insert(
              array('name'=>'Service 1',
                   'parent_id'=>'18',
                   'model'=>'service-top',
                   'controller'=>'ServiceTopController',
                   'link'=>'service-top/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //5
        DB::table('admin_menus')->insert(
              array('name'=>'Service 2',
                   'parent_id'=>'18',
                   'model'=>'service-bot',
                   'controller'=>'ServiceBotController',
                   'link'=>'service-bot/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

        DB::table('admin_menus')->insert(
              array('name'=>'Portfollio',
                   'parent_id'=>'0',
                   'model'=>'portfollio',
                   'controller'=>'PortfollioController',
                   'link'=>'portfollio/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

        DB::table('admin_menus')->insert(
              array('name'=>'Client',
                   'parent_id'=>'0',
                   'model'=>'company-info',
                   'controller'=>'NULL',
                   'link'=>'#',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //4
        DB::table('admin_menus')->insert(
              array('name'=>'Tittle',
                   'parent_id'=>'22',
                   'model'=>'client-title',
                   'controller'=>'ClientTitleController',
                   'link'=>'client-title/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức
        //5
        DB::table('admin_menus')->insert(
              array('name'=>'Content',
                   'parent_id'=>'22',
                   'model'=>'client-content',
                   'controller'=>'ClientContentController',
                   'link'=>'client-content/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        ); // Tin tức

        //6 Du an
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Dự Án',
        //            'parent_id'=>'0',
        //            'model'=>'projects',
        //            'controller'=>'NULL',
        //            'link'=>'#',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );
        //7 //Du an
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Category',
        //            'parent_id'=>'6',
        //            'model'=>'category-projects',
        //            'controller'=>'CategoryProjectsController',
        //            'link'=>'category-projects/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );
        //8 Du an
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Dự Án',
        //            'parent_id'=>'6',
        //            'model'=>'projects',
        //            'controller'=>'ProjectsController',
        //            'link'=>'projects/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        //9 Dich vu
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Dịch vụ',
        //            'parent_id'=>'0',
        //            'model'=>'services',
        //            'controller'=>'NULL',
        //            'link'=>'#',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );
        //10 //Dich vu
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Category',
        //            'parent_id'=>'9',
        //            'model'=>'category-services',
        //            'controller'=>'CategoryServicesController',
        //            'link'=>'category-services/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );
        //11 Dich vu
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Dich vu',
        //            'parent_id'=>'9',
        //            'model'=>'services',
        //            'controller'=>'ServicesController',
        //            'link'=>'services/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Customer',
        //            'parent_id'=>'0',
        //            'model'=>'customers',
        //            'controller'=>'CustomerController',
        //            'link'=>'customers/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Slide',
        //            'parent_id'=>'0',
        //            'model'=>'slide',
        //            'controller'=>'SlideController',
        //            'link'=>'slide/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        

        // DB::table('admin_menus')->insert(
        //       array('name'=>'About us 1',
        //            'parent_id'=>'0',
        //            'model'=>'about-us-1',
        //            'controller'=>'AboutController',
        //            'link'=>'about-us-1/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Tag',
        //            'parent_id'=>'0',
        //            'model'=>'tags',
        //            'controller'=>'TagsController',
        //            'link'=>'tags/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Staff',
        //            'parent_id'=>'0',
        //            'model'=>'staff',
        //            'controller'=>'StaffController',
        //            'link'=>'staff/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Support',
        //            'parent_id'=>'0',
        //            'model'=>'support',
        //            'controller'=>'SupportController',
        //            'link'=>'support/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        DB::table('admin_menus')->insert(
              array('name'=>'Contact',
                   'parent_id'=>'0',
                   'model'=>'contact',
                   'controller'=>'ContactController',
                   'link'=>'contact/lists',
                   'p_order'=>'2',
                   'is_active'=>'1')
        );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'MakeQuestion',
        //            'parent_id'=>'0',
        //            'model'=>'make-question',
        //            'controller'=>'NULL',
        //            'link'=>'#',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Question',
        //            'parent_id'=>'19',
        //            'model'=>'question',
        //            'controller'=>'MakeQuestionController',
        //            'link'=>'question/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Answer',
        //            'parent_id'=>'19',
        //            'model'=>'answer',
        //            'controller'=>'MakeAnswerController',
        //            'link'=>'answer/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Stragety',
        //            'parent_id'=>'0',
        //            'model'=>'stragety',
        //            'controller'=>'NULL',
        //            'link'=>'#',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );
        // //10 //Dich vu
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Category',
        //            'parent_id'=>'22',
        //            'model'=>'category-stragety',
        //            'controller'=>'StragetyCategoryController',
        //            'link'=>'category-stragety/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );
        // //11 Dich vu
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Stragety',
        //            'parent_id'=>'22',
        //            'model'=>'stragety',
        //            'controller'=>'StragetyController',
        //            'link'=>'stragety/lists',
        //            'p_order'=>'2',
        //            'is_active'=>'1')
        // );

        // //3
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Event',
        //            'parent_id'=>'0',
        //            'model'=>'event',
        //            'controller'=>'EventController',
        //            'link'=>'event/lists',
        //            'p_order'=>'3',
        //            'is_active'=>'1')
        // );

        //4
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Jobs',
        //            'parent_id'=>'0',
        //            'model'=>'jobs',
        //            'controller'=>'JobsController',
        //            'link'=>'jobs/lists',
        //            'p_order'=>'4',
        //            'is_active'=>'1')
        // );

        // //5
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Hobby',
        //            'parent_id'=>'0',
        //            'model'=>'hobby',
        //            'controller'=>'HobbyController',
        //            'link'=>'hobby/lists',
        //            'p_order'=>'5',
        //            'is_active'=>'1')
        // );
        // //7
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Member Join',
        //            'parent_id'=>'0',
        //            'model'=>'member-join-event',
        //            'controller'=>'MemberJoinEventController',
        //            'link'=>'member-join-event/lists',
        //            'p_order'=>'6',
        //            'is_active'=>'1')
        // );
        // //7
        // DB::table('admin_menus')->insert(
        //       array('name'=>'Notifcation',
        //            'parent_id'=>'0',
        //            'model'=>'notifcation',
        //            'controller'=>'NotifcationController',
        //            'link'=>'notifcation/lists',
        //            'p_order'=>'7',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Client',
        //            'parent_id'=>'0',
        //            'model'=>'clients',
        //            'controller'=>'ClientController',
        //            'link'=>'clients/lists',
        //            'p_order'=>'7',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'News',
        //            'parent_id'=>'0',
        //            'model'=>'null',
        //            'controller'=>'NULL',
        //            'link'=>'#',
        //            'p_order'=>'7',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'Category',
        //            'parent_id'=>'10',
        //            'model'=>'category-news',
        //            'controller'=>'CategoryNewsController',
        //            'link'=>'category-news/lists',
        //            'p_order'=>'1',
        //            'is_active'=>'1')
        // );

        // DB::table('admin_menus')->insert(
        //       array('name'=>'News',
        //            'parent_id'=>'10',
        //            'model'=>'news',
        //            'controller'=>'NewsController',
        //            'link'=>'news/lists',
        //            'p_order'=>'1',
        //            'is_active'=>'1')
        // );
        
    }
}
