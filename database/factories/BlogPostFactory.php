<?php

use App\BlogPost;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(BlogPost::class, function(Faker $faker) 
  {
    $title = array(
      'Cupim jowl brisket corned beef beef',
      'Flank pork loin shank beef ribs pancetta'
    );

    $excerpt = array(
      'Bacon ipsum dolor amet beef ribs doner tenderloin, swine turkey pork chop meatball brisket prosciutto capicola tail short loin kielbasa filet mignon',
      'Tenderloin brisket buffalo, alcatra flank chicken short loin corned beef tongue pig'
    );

    $content = 'Picanha alcatra jerky chicken spare ribs, capicola pancetta pork belly t-bone beef venison. Rump tail doner brisket biltong short loin porchetta pork chop. Ground round sirloin filet mignon venison. Flank pork loin shank beef ribs pancetta. Landjaeger pancetta tongue tenderloin jowl chicken sirloin flank shoulder picanha cow prosciutto tri-tip hamburger porchetta. Beef ribs pork chop pastrami, meatloaf capicola tenderloin venison fatback bacon pork belly shankle picanha t-bone rump kevin. Bacon frankfurter cupim swine.';

    return array(
      'title' => $title[rand(0, count($title) - 1)],
      'excerpt' => $excerpt[rand(0, count($excerpt) - 1)],
      'content' => $content,
      'user_id' => 1,
      'online_at' => now(),
      'theme_image' => 'https://via.placeholder.com/800'
    );
});
