<?php

use App\BlogEntry;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(BlogEntry::class, function (Faker $faker) {
    $titles = array(
        'Picanha alcatra jerky chicken spare ribs, capicola pancetta pork belly t-bone beef venison',
        'Flank pork loin shank beef ribs pancetta',
        'Picanha pork belly tenderloin, tongue kevin chicken cupim shankle biltong kielbasa spare ribs',
        'Cupim jowl brisket corned beef beef'
    );
    $content = array(
        "Bacon ipsum dolor amet beef ribs doner tenderloin, swine turkey pork chop meatball brisket prosciutto capicola tail short loin kielbasa filet mignon. Swine alcatra tenderloin tail, corned beef beef bresaola chicken short ribs ground round. Cupim jowl brisket corned beef beef. Tenderloin brisket buffalo, alcatra flank chicken short loin corned beef tongue pig. Doner frankfurter bresaola andouille kielbasa ball tip, pancetta bacon short ribs jerky ground round meatloaf. Andouille kielbasa venison landjaeger.

Landjaeger picanha beef spare ribs bacon cupim pork chop, sirloin ball tip hamburger shank salami corned beef t-bone burgdoggen. Picanha pork belly tenderloin, tongue kevin chicken cupim shankle biltong kielbasa spare ribs. Picanha pig sirloin, cupim tail ribeye capicola tenderloin strip steak porchetta venison. Pastrami shank burgdoggen kevin fatback picanha shankle rump doner. Shankle ribeye burgdoggen jowl kevin hamburger chicken meatloaf tongue cow doner.",
        "Picanha alcatra jerky chicken spare ribs, capicola pancetta pork belly t-bone beef venison. Rump tail doner brisket biltong short loin porchetta pork chop. Ground round sirloin filet mignon venison. Flank pork loin shank beef ribs pancetta. Landjaeger pancetta tongue tenderloin jowl chicken sirloin flank shoulder picanha cow prosciutto tri-tip hamburger porchetta. Beef ribs pork chop pastrami, meatloaf capicola tenderloin venison fatback bacon pork belly shankle picanha t-bone rump kevin. Bacon frankfurter cupim swine.

Pancetta corned beef sirloin picanha. Strip steak shoulder boudin burgdoggen capicola pancetta. Biltong beef short ribs swine tail chuck filet mignon fatback pork doner hamburger kielbasa. Pancetta cow shankle short ribs, kielbasa bresaola buffalo andouille. Hamburger meatball short loin, pork strip steak ham pork belly. Chuck short ribs beef shoulder."
    );
    
    return [
        'title' => $titles[rand(0, count($titles) - 1)],
        'content' => $content[rand(0, count($content) - 1)],
        'online' => true,
        'slug' => ''
    ];
});
