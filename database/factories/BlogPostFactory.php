<?php

use App\BlogPost;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(BlogPost::class, function(Faker $faker) 
  {
    $title = array(
      "I wonder why do procurement departments still exist today?",
      "Outbound Training in India - A growing trend",
      "Why can a family-owned business fail?",
      "Achieving Competitive Advantage through Collaboration with Key Customers and Suppliers",
      "Business Competition Best Practices: Win Loss Research"
    );

    $excerpt = array(
      "I am amazed that it is taking such a long a time for procurement departments of indirect goods and services to perish and be replaced by a function called commercial",
      "In this hectic world of business, team management, team composition and team building is very important",
      "It so happens that a very large percentage of automotive dealerships around the world happen to be family-owned businesses",
      "In the past when companies pondered corporate strategy, operations had been peripheral to the discussion",
      "Most people are surprised when I tell them that getting useful competitive intelligence is actually the easiest part of managing successful business competition"
    );

    $content = array(
      "It seems that some of the good old procurement and business bureaucrats have managed to keep this function alive and kicking while spending hard-earned company money trying to save it.

In fact some bureaucrats have gone much further and persuaded their boards to develop a sophisticated procurement system solution which they claim will save a huge amount of money.

They have even managed to convince their companies that after they build this great system, they will save even more money, perhaps up to 50 per cent, if they also use an e-procurement tool that will interact automatically with all concerned.

I am not saying that creating an IT system for purchasing is a bad thing or not needed to control stray spending and increase leverage. I am not saying that creating an e-procurement solution is not a good thing or that it doesn't save time and money, especially when buying paper clips and printer toners."
, "Earlier training used to be held in the stiff office board rooms within four enclosed walls and even though it seemed like a great idea, it usually turned into groupism, with members divided into small groups instead of a team and was not all that management wanted. Other plans like team sports and office picnics also fell by the way, because not every member was interested.

Outbound Training (OBT) is a new concept where it was neither a picnic nor a team exercise held within the four walls of the office. It was a combination of both and was a new venture .It focused more on team achievement and team centered goals, Individual achievements did not matter if the team did not do good. This was both good for the team and the individuals too as their focus was more on the team spirit than individual glory.

Outbound Training (OBT) are usually held in camps in a secluded jungle or hill regions and consists of a wide variety of activities, both physically and mentally challenging. Involving physical activities like trekking, Rappelling, treasure hunts and sometimes even more adventure sports like rafting and rock climbing. Team dynamics like communication, problem solving, decision-making and managing change come into focus during these periods."
, "Operations were seen as a series of puzzles with single best solutions. The realization that optimization of parts did not optimize the whole led to new focus - operational management went up a level from looking at individual tasks to looking at whole processes. During the 1960s, Japanese manufactures obtained competitive advantage by optimizing operational efficiency, which meant lower prices, flexible production capabilities and a reduction in lead times. Operational considerations became a key theme in strategic discussions.

During the 1990s, companies like Dell took this further. The computer market was changing faster than any other market had done in history. Dell began managing operations by synchronizing functional activity into a single corporate heartbeat. An order instantly drove procurement, which drove production and then distribution. The result was a further drop in lead times, inventory requirements, and operating costs along with flexibility. Operational efficiency was Dell's sole source of competitive advantage and it reaped enormous market share gains.

Collaboration - The Next Step
The historical trend is clear. The impact that one activity has on the next means they cannot be optimized in isolation. The result is that operations have become the key corporate strategic consideration. Yet the nature of competitive advantage is to elapse as competitors replicate it, which places a continual onus on companies to find new differentials. This begs the question - what next?

The answer lies in another step up in the way we view corporate operation. We need to look beyond the borders of the firm in our search for operational efficiency. Optimized company operations can only be achieved through alignment and coordination with the agents up and down stream. Collaboration with suppliers and customers is the essential vehicle of the 21st century for achieving competitive advantage from operations."
, "Win Loss Research is a succinct, guided discussion with decision makers and influencers who have been involved in your recent win and loss sales decisions. The goal is to learn what key distinctions they saw between you and your competitors, the importance of those distinctions and the value they assigned to each competitor. While the focus of this research is on gaining insight into how your competitors operate and how you fare in comparison, it is inevitable that you also gain valuable customer information in the process.

Win Loss Research drills down beyond standard pricing issues and gets into territories such as: decision process, sales team approach and professionalism, company reputation, product attributes, service issues, and handling of proposals. Although pricing information is involved, it should not be the centerpiece of the research unless it becomes apparent that it really was the key issue that drove the decision. The goal of Win Loss Research is to provide you with competitive insight you can act upon - actionable competitive intelligence - for sales process improvement and better results.

Typically this research is conducted either over the telephone or in a face-to-face interview. The latter is more common in places and cultures where that is the preferred communication modality. Getting the results that you want out of Win Loss Research is a combination of art and science; art being the skill of the researcher in eliciting the intelligence that you need; science being the development of a research guide that facilitates the discovery of actionable competitive intelligence."
    );

    return array(
      'title' => $title[rand(0, count($title) - 1)],
      'excerpt' => $excerpt[rand(0, count($excerpt) - 1)],
      'content' => $content[rand(0, count($content) - 1)],
      'user_id' => 1,
      'online_at' => now()
    );
});
