<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('pages')->insert(
        [
            'title' => "About",
            'description' => "About Description",
            'navlabel' => "About",
            'language' => 'en',
            'slug' => "about",
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'seotitle' => "About",
            'seodescription' => "About",
            'seokeyword' => "About",
            'order'        => 1,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

        DB::table('pages')->insert(
        [
            'title' => "Privacy",
            'description' => "Privacy Description",
            'navlabel' => "Privacy",
            'language' => 'en',
            'slug' => "privacy",
            'content' => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.",
            'seotitle' => "Privacy",
            'seodescription' => "Privacy",
            'seokeyword' => "Privacy",
            'order'        => 2,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

        DB::table('pages')->insert(
        [
            'title' => "Terms and Condition",
            'description' => "Terms and Condition Description",
            'navlabel' => "Terms and Condition",
            'language' => 'en',
            'slug' => "terms-condition",
            'content' => "Duis quis elit cursus, varius libero nec, sodales lacus. Mauris finibus ornare sapien eu venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper imperdiet varius. Donec sollicitudin justo non mauris laoreet venenatis. Mauris nec tempor ante. Vestibulum feugiat nec arcu sit amet ultrices. Praesent scelerisque euismod orci vitae rutrum.

Cras accumsan lobortis dui, a bibendum massa ullamcorper at. Nunc nec ex eget leo ultricies scelerisque sit amet sit amet enim. Nulla scelerisque eros vel hendrerit tempus. Sed et diam mi. Nunc pharetra ullamcorper congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras eget ultrices leo, aliquam fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sagittis ipsum eu neque dapibus, gravida fermentum eros malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eleifend nunc in diam tempus interdum.

Cras non urna dictum, consectetur arcu id, consequat magna. Praesent id leo at ligula ultricies tincidunt vitae vitae magna. Nam vehicula mi sed dui placerat dignissim. Curabitur ac nibh bibendum tortor pulvinar tincidunt. Etiam sed faucibus nulla. Sed vel sapien tincidunt, tempor mauris nec, dignissim urna. Duis gravida in tellus id imperdiet. Integer sed rutrum metus. Nulla sed euismod elit. Sed eleifend posuere dictum. Proin ac laoreet lorem, vitae facilisis nulla.

Fusce lobortis pharetra lectus sit amet volutpat. Nullam et ante at elit gravida ultricies at sit amet diam. Mauris vitae congue nunc, et consectetur dolor. Sed scelerisque dolor scelerisque metus molestie, vel eleifend neque dapibus. Suspendisse est nulla, commodo ac sem quis, posuere molestie purus. Phasellus vitae risus vel justo hendrerit vulputate. Integer condimentum odio purus, eu egestas augue fermentum ac. Cras aliquet lorem id volutpat venenatis. Donec id nunc odio. Maecenas tortor odio, mattis congue suscipit ut, volutpat non mi. Morbi quis nisi condimentum, auctor ligula ut, laoreet magna.

Fusce maximus at sapien sit amet condimentum. Fusce vitae lorem sollicitudin, dignissim velit quis, consectetur mi. Nam gravida lorem diam, a hendrerit diam cursus sed. Suspendisse potenti. Etiam pharetra nibh tortor, sollicitudin dignissim ante malesuada nec. Pellentesque vulputate magna eu dapibus pretium. Quisque accumsan cursus neque dignissim venenatis. Curabitur rutrum enim sed eros porta hendrerit ut sed mauris. Integer a sagittis nisi. Praesent id purus neque. Sed vulputate interdum ipsum vel varius. Cras maximus nisl eget libero luctus, vitae pulvinar quam elementum. Nullam id justo lacus. Nulla quis odio lectus.",
            'seotitle' => "Terms and Condition",
            'seodescription' => "Terms and Condition",
            'seokeyword' => "Terms and Condition",
            'order'        => 3,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);


        DB::table('pages')->insert(
        [
            'title' => "How it Works",
            'description' => "How it Works Description",
            'navlabel' => "How it Works",
            'language' => 'en',
            'slug' => "how-it-works",
            'content' => "How it Works Content Comes Here.",
            'seotitle' => "How it Works",
            'seodescription' => "How it Works",
            'seokeyword' => "How it Works",
            'order'        => 4,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

       


        DB::table('pages')->insert(
        [
            'title' => "Our Story",
            'description' => "Our Story Description",
            'navlabel' => "Our Story",
            'language' => 'en',
            'slug' => "our-story",
            'content' => "Content Page for our story. You can login to admin panel and edit the story. 

            Duis quis elit cursus, varius libero nec, sodales lacus. Mauris finibus ornare sapien eu venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper imperdiet varius. Donec sollicitudin justo non mauris laoreet venenatis. Mauris nec tempor ante. Vestibulum feugiat nec arcu sit amet ultrices. Praesent scelerisque euismod orci vitae rutrum.

Cras accumsan lobortis dui, a bibendum massa ullamcorper at. Nunc nec ex eget leo ultricies scelerisque sit amet sit amet enim. Nulla scelerisque eros vel hendrerit tempus. Sed et diam mi. Nunc pharetra ullamcorper congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras eget ultrices leo, aliquam fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sagittis ipsum eu neque dapibus, gravida fermentum eros malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eleifend nunc in diam tempus interdum.

Cras non urna dictum, consectetur arcu id, consequat magna. Praesent id leo at ligula ultricies tincidunt vitae vitae magna. Nam vehicula mi sed dui placerat dignissim. Curabitur ac nibh bibendum tortor pulvinar tincidunt. Etiam sed faucibus nulla. Sed vel sapien tincidunt, tempor mauris nec, dignissim urna. Duis gravida in tellus id imperdiet. Integer sed rutrum metus. Nulla sed euismod elit. Sed eleifend posuere dictum. Proin ac laoreet lorem, vitae facilisis nulla.

Fusce lobortis pharetra lectus sit amet volutpat. Nullam et ante at elit gravida ultricies at sit amet diam. Mauris vitae congue nunc, et consectetur dolor. Sed scelerisque dolor scelerisque metus molestie, vel eleifend neque dapibus. Suspendisse est nulla, commodo ac sem quis, posuere molestie purus. Phasellus vitae risus vel justo hendrerit vulputate. Integer condimentum odio purus, eu egestas augue fermentum ac. Cras aliquet lorem id volutpat venenatis. Donec id nunc odio. Maecenas tortor odio, mattis congue suscipit ut, volutpat non mi. Morbi quis nisi condimentum, auctor ligula ut, laoreet magna.

Fusce maximus at sapien sit amet condimentum. Fusce vitae lorem sollicitudin, dignissim velit quis, consectetur mi. Nam gravida lorem diam, a hendrerit diam cursus sed. Suspendisse potenti. Etiam pharetra nibh tortor, sollicitudin dignissim ante malesuada nec. Pellentesque vulputate magna eu dapibus pretium. Quisque accumsan cursus neque dignissim venenatis. Curabitur rutrum enim sed eros porta hendrerit ut sed mauris. Integer a sagittis nisi. Praesent id purus neque. Sed vulputate interdum ipsum vel varius. Cras maximus nisl eget libero luctus, vitae pulvinar quam elementum. Nullam id justo lacus. Nulla quis odio lectus.",
            'seotitle' => "About",
            'seodescription' => "About",
            'seokeyword' => "About",
            'order'        => 5,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

         DB::table('pages')->insert(
        [
            'title' => "Leadership",
            'description' => "Leadership Description",
            'navlabel' => "Leadership",
            'language' => 'en',
            'slug' => "leadership",
            'content' => "Content Page for leadership. You can login to admin panel and edit. 

            Duis quis elit cursus, varius libero nec, sodales lacus. Mauris finibus ornare sapien eu venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper imperdiet varius. Donec sollicitudin justo non mauris laoreet venenatis. Mauris nec tempor ante. Vestibulum feugiat nec arcu sit amet ultrices. Praesent scelerisque euismod orci vitae rutrum.

Cras accumsan lobortis dui, a bibendum massa ullamcorper at. Nunc nec ex eget leo ultricies scelerisque sit amet sit amet enim. Nulla scelerisque eros vel hendrerit tempus. Sed et diam mi. Nunc pharetra ullamcorper congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras eget ultrices leo, aliquam fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sagittis ipsum eu neque dapibus, gravida fermentum eros malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eleifend nunc in diam tempus interdum.

Cras non urna dictum, consectetur arcu id, consequat magna. Praesent id leo at ligula ultricies tincidunt vitae vitae magna. Nam vehicula mi sed dui placerat dignissim. Curabitur ac nibh bibendum tortor pulvinar tincidunt. Etiam sed faucibus nulla. Sed vel sapien tincidunt, tempor mauris nec, dignissim urna. Duis gravida in tellus id imperdiet. Integer sed rutrum metus. Nulla sed euismod elit. Sed eleifend posuere dictum. Proin ac laoreet lorem, vitae facilisis nulla.

Fusce lobortis pharetra lectus sit amet volutpat. Nullam et ante at elit gravida ultricies at sit amet diam. Mauris vitae congue nunc, et consectetur dolor. Sed scelerisque dolor scelerisque metus molestie, vel eleifend neque dapibus. Suspendisse est nulla, commodo ac sem quis, posuere molestie purus. Phasellus vitae risus vel justo hendrerit vulputate. Integer condimentum odio purus, eu egestas augue fermentum ac. Cras aliquet lorem id volutpat venenatis. Donec id nunc odio. Maecenas tortor odio, mattis congue suscipit ut, volutpat non mi. Morbi quis nisi condimentum, auctor ligula ut, laoreet magna.

Fusce maximus at sapien sit amet condimentum. Fusce vitae lorem sollicitudin, dignissim velit quis, consectetur mi. Nam gravida lorem diam, a hendrerit diam cursus sed. Suspendisse potenti. Etiam pharetra nibh tortor, sollicitudin dignissim ante malesuada nec. Pellentesque vulputate magna eu dapibus pretium. Quisque accumsan cursus neque dignissim venenatis. Curabitur rutrum enim sed eros porta hendrerit ut sed mauris. Integer a sagittis nisi. Praesent id purus neque. Sed vulputate interdum ipsum vel varius. Cras maximus nisl eget libero luctus, vitae pulvinar quam elementum. Nullam id justo lacus. Nulla quis odio lectus.",
            'seotitle' => "Leadership",
            'seodescription' => "Leadership",
            'seokeyword' => "Leadership",
            'order'        => 6,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

        DB::table('pages')->insert(
        [
            'title' => "Compliance",
            'description' => "Compliance Description",
            'navlabel' => "Compliance",
            'language' => 'en',
            'slug' => "compliance",
            'content' => "Content Page for Compliance. You can login to admin panel and edit. 

            Duis quis elit cursus, varius libero nec, sodales lacus. Mauris finibus ornare sapien eu venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper imperdiet varius. Donec sollicitudin justo non mauris laoreet venenatis. Mauris nec tempor ante. Vestibulum feugiat nec arcu sit amet ultrices. Praesent scelerisque euismod orci vitae rutrum.

Cras accumsan lobortis dui, a bibendum massa ullamcorper at. Nunc nec ex eget leo ultricies scelerisque sit amet sit amet enim. Nulla scelerisque eros vel hendrerit tempus. Sed et diam mi. Nunc pharetra ullamcorper congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras eget ultrices leo, aliquam fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sagittis ipsum eu neque dapibus, gravida fermentum eros malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eleifend nunc in diam tempus interdum.

Cras non urna dictum, consectetur arcu id, consequat magna. Praesent id leo at ligula ultricies tincidunt vitae vitae magna. Nam vehicula mi sed dui placerat dignissim. Curabitur ac nibh bibendum tortor pulvinar tincidunt. Etiam sed faucibus nulla. Sed vel sapien tincidunt, tempor mauris nec, dignissim urna. Duis gravida in tellus id imperdiet. Integer sed rutrum metus. Nulla sed euismod elit. Sed eleifend posuere dictum. Proin ac laoreet lorem, vitae facilisis nulla.

Fusce lobortis pharetra lectus sit amet volutpat. Nullam et ante at elit gravida ultricies at sit amet diam. Mauris vitae congue nunc, et consectetur dolor. Sed scelerisque dolor scelerisque metus molestie, vel eleifend neque dapibus. Suspendisse est nulla, commodo ac sem quis, posuere molestie purus. Phasellus vitae risus vel justo hendrerit vulputate. Integer condimentum odio purus, eu egestas augue fermentum ac. Cras aliquet lorem id volutpat venenatis. Donec id nunc odio. Maecenas tortor odio, mattis congue suscipit ut, volutpat non mi. Morbi quis nisi condimentum, auctor ligula ut, laoreet magna.

Fusce maximus at sapien sit amet condimentum. Fusce vitae lorem sollicitudin, dignissim velit quis, consectetur mi. Nam gravida lorem diam, a hendrerit diam cursus sed. Suspendisse potenti. Etiam pharetra nibh tortor, sollicitudin dignissim ante malesuada nec. Pellentesque vulputate magna eu dapibus pretium. Quisque accumsan cursus neque dignissim venenatis. Curabitur rutrum enim sed eros porta hendrerit ut sed mauris. Integer a sagittis nisi. Praesent id purus neque. Sed vulputate interdum ipsum vel varius. Cras maximus nisl eget libero luctus, vitae pulvinar quam elementum. Nullam id justo lacus. Nulla quis odio lectus.",
            'seotitle' => "Compliance",
            'seodescription' => "Compliance",
            'seokeyword' => "Compliance",
            'order'        => 7,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

     
        
        DB::table('pages')->insert(
        [
            'title' => "careers",
            'description' => "careers Description",
            'navlabel' => "careers",
            'language' => 'en',
            'slug' => "careers",
            'content' => "Content Page for careers. You can login to admin panel and edit. 

            Duis quis elit cursus, varius libero nec, sodales lacus. Mauris finibus ornare sapien eu venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper imperdiet varius. Donec sollicitudin justo non mauris laoreet venenatis. Mauris nec tempor ante. Vestibulum feugiat nec arcu sit amet ultrices. Praesent scelerisque euismod orci vitae rutrum.

            ",
            'seotitle' => "careers",
            'seodescription' => "careers",
            'seokeyword' => "careers",
            'order'        => 8,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

        DB::table('pages')->insert(
        [
            'title' => "Press kit",
            'description' => "Press kit Description",
            'navlabel' => "Press kit",
            'language' => 'en',
            'slug' => "press-kit",
            'content' => "Content Page for Press kit. You can login to admin panel and edit. 

            Duis quis elit cursus, varius libero nec, sodales lacus. Mauris finibus ornare sapien eu venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper imperdiet varius. Donec sollicitudin justo non mauris laoreet venenatis. 
            ",
            'seotitle' => "Press Kit",
            'seodescription' => "Press Kit",
            'seokeyword' => "Press Kit",
            'order'        => 9,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

        DB::table('pages')->insert(
        [
            'title' => "How Hayvn is Different",
            'description' => "How Hayvn is Different",
            'navlabel' => "How Hayvn is Different",
            'language' => 'en',
            'slug' => "how-hayvn",
            'content' => "Donec sit amet sapien et mi mattis vulputate a a neque. Mauris in odio et est feugiat pulvinar ac vitae magna. In eget lacinia nibh, sit amet suscipit felis. Integer eget massa sit amet nisi condimentum bibendum vel in ligula. Pellentesque ipsum nunc, facilisis a ipsum sit amet, pretium congue erat. Morbi erat nisl, mattis id euismod at, tempus ac leo. Nulla scelerisque est a dolor efficitur, in commodo enim consequat. Etiam eu imperdiet enim, a finibus felis. Suspendisse mollis nec erat eu euismod. Nunc scelerisque lacus dolor, sed posuere leo condimentum sit amet. Nam semper, tortor a vehicula blandit, erat arcu iaculis erat, eget aliquet quam ante at tortor. Nunc sapien nisl, posuere quis egestas id, lacinia at quam. Donec aliquam nisl vel leo pellentesque, at sagittis mi ultrices. Donec scelerisque molestie tortor, vitae tempor leo finibus eget. Duis et augue nisi.
            ",
            'seotitle' => "How Hayvn is Different",
            'seodescription' => "How Hayvn is Different",
            'seokeyword' => "How Hayvn is Different",
            'order'        => 10,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);
         DB::table('pages')->insert(
        [
            'title' => "Personal Traders",
            'description' => "Personal Traders",
            'navlabel' => "Personal Traders",
            'language' => 'en',
            'slug' => "personal-traders",
            'content' => "Maecenas imperdiet imperdiet ornare. Vivamus ac lectus non nunc semper lacinia. Curabitur egestas nec nisl ac semper. Morbi vitae nulla orci. Phasellus ipsum felis, ullamcorper semper orci id, imperdiet sagittis tellus. Maecenas sit amet tempus purus. Suspendisse ut mauris leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam hendrerit orci ac risus laoreet iaculis. Suspendisse pulvinar consectetur quam non faucibus. Suspendisse quis arcu ipsum. Morbi a diam ut velit facilisis porta a at arcu. Aliquam ullamcorper, sapien feugiat ornare molestie, massa nibh vestibulum lacus, ac iaculis erat lorem auctor augue. Suspendisse potenti. Vestibulum auctor porta posuere. Proin egestas elit a dui venenatis, eu laoreet nulla maximus.
            ",
            'seotitle' => "Personal Traders",
            'seodescription' => "Personal Traders",
            'seokeyword' => "Personal Traders",
            'order'        => 11,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

        DB::table('pages')->insert(
        [
            'title' => "Institutional client",
            'description' => "Institutional client",
            'navlabel' => "Institutional client",
            'language' => 'en',
            'slug' => "institutional-client",
            'content' => "Fusce faucibus interdum nisl at fringilla. Nam id pretium turpis, in ultrices massa. Maecenas ipsum neque, mattis eget efficitur ac, rhoncus vitae enim. Cras elit tortor, placerat fringilla odio eget, dictum eleifend enim. Quisque eget eleifend orci. Donec maximus posuere viverra. Proin malesuada suscipit porttitor. Aliquam et laoreet est. Sed aliquet nibh tempus tortor pharetra consectetur. Sed laoreet, libero sed sagittis pretium, elit mi rhoncus sapien, sed gravida purus turpis non neque. Suspendisse nec dignissim nunc. Maecenas elementum lacinia rhoncus. Integer eu laoreet leo. Integer lorem justo, tristique sed accumsan ut, pretium nec lorem. Aliquam eget tortor non neque interdum egestas. Vestibulum fringilla malesuada nulla, et tristique quam mattis sed.
            ",
            'seotitle' => "Institutional client",
            'seodescription' => "Institutional client",
            'seokeyword' => "Institutional client",
            'order'        => 12,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);
        DB::table('pages')->insert(
        [
            'title' => "Securing Hayvn",
            'description' => "Securing Hayvn",
            'navlabel' => "Securing Hayvn",
            'language' => 'en',
            'slug' => "security",
            'content' => "Duis rutrum pharetra urna vel blandit. Nullam ac consectetur tellus. Sed tristique orci in magna fringilla, congue tincidunt sapien accumsan. Pellentesque ligula massa, lacinia nec ultrices vitae, placerat a arcu. Sed id lectus luctus, sodales dui pulvinar, malesuada sapien. Curabitur ac orci elementum eros venenatis condimentum. Phasellus laoreet ullamcorper tempus. In dignissim posuere pretium. Donec dignissim, dui vel molestie feugiat, erat mauris aliquam ligula, in ultrices elit augue vel ante. Integer felis massa, vestibulum sollicitudin mi vel, vulputate molestie ex. Aliquam erat volutpat. Donec ornare id risus non imperdiet. Maecenas finibus erat quis fermentum lacinia. Nam et diam nulla.",
            'seotitle' => "Securing Hayvn",
            'seodescription' => "Securing Hayvn",
            'seokeyword' => "Securing Hayvn",
            'order'        => 13,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);
        DB::table('pages')->insert(
        [
            'title' => "Best Execution Practices",
            'description' => "Best Execution Practices",
            'navlabel' => "Best Execution Practices",
            'language' => 'en',
            'slug' => "execution-practices",
            'content' => "Duis rutrum pharetra urna vel blandit. Nullam ac consectetur tellus. Sed tristique orci in magna fringilla, congue tincidunt sapien accumsan. Pellentesque ligula massa, lacinia nec ultrices vitae, placerat a arcu. Sed id lectus luctus, sodales dui pulvinar, malesuada sapien. Curabitur ac orci elementum eros venenatis condimentum. Phasellus laoreet ullamcorper tempus. In dignissim posuere pretium. Donec dignissim, dui vel molestie feugiat, erat mauris aliquam ligula, in ultrices elit augue vel ante. Integer felis massa, vestibulum sollicitudin mi vel, vulputate molestie ex. Aliquam erat volutpat. Donec ornare id risus non imperdiet. Maecenas finibus erat quis fermentum lacinia. Nam et diam nulla.",
            'seotitle' => "Best Execution Practices",
            'seodescription' => "Best Execution Practices",
            'seokeyword' => "Best Execution Practices",
            'order'        => 14,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);
        DB::table('pages')->insert(
        [
            'title' => "Our Fees",
            'description' => "Our Fees",
            'navlabel' => "Our Fees",
            'language' => 'en',
            'slug' => "fees",
            'content' => "Pellentesque lacus metus, rutrum in lacinia at, maximus eget eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Praesent elit turpis, venenatis in consequat ut, vulputate a ante. Duis sit amet magna et eros dapibus fermentum sit amet at augue. Phasellus dolor risus, ultrices ut sapien nec, consequat consequat velit. Proin sit amet fringilla leo. Phasellus tincidunt egestas eleifend. Suspendisse pellentesque tempor rhoncus.",
            'seotitle' => "Our Fees",
            'seodescription' => "Our Fees",
            'seokeyword' => "Our Fees",
            'order'        => 15,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);

        DB::table('pages')->insert([
            'title' => "Business Ethics and Codes",
            'description' => "Business Ethics and Codes",
            'navlabel' => "Business Ethics and Codes",
            'language' => 'en',
            'slug' => "business-ethics-and-codes",
            'content' => "Pellentesque lacus metus, rutrum in lacinia at, maximus eget eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Praesent elit turpis, venenatis in consequat ut, vulputate a ante. Duis sit amet magna et eros dapibus fermentum sit amet at augue. Phasellus dolor risus, ultrices ut sapien nec, consequat consequat velit. Proin sit amet fringilla leo. Phasellus tincidunt egestas eleifend. Suspendisse pellentesque tempor rhoncus.",
            'seotitle' => "Business Ethics and Codes",
            'seodescription' => "Business Ethics and Codes",
            'seokeyword' => "Business Ethics and Codes",
            'order'        => 16,
            'active'        => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),     
        ]);
    }
}