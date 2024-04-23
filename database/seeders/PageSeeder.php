<?php

namespace Database\Seeders;

use Botble\Base\Facades\Html;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Page\Models\Page;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Support\Arr;

class PageSeeder extends BaseSeeder
{
    public function run(): void
    {
        Page::query()->truncate();

        $this->uploadFiles('general');
        $this->uploadFiles('accounts');
        $this->uploadFiles('icons');

        $pages = [
            [
                'name' => 'Homepage 1',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="The data layer between your {{ business }} and its potential." subtitle="Optimize write performance with a document data model that maps to your application’s access patterns. Meet a wide range of query requirements via a single query API that supports everything from simple lookups to complex processing pipelines for data analytics and transformations." banner_primary="general/hero-banner.png" button_primary_label="Download App" button_primary_url="/app" button_secondary_label="Learn more" button_secondary_url="/contact"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers, Trusted By Enterprises" subtitle="We helped these brands turn online assessments into success stories. Join them. Elevate your testing." quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="yes" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="yes" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="yes" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="yes" style="style-1"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[services title="What We Offer" subtitle="What makes us different from others? We give holistic solutions with strategy, design & technology." button_secondary_label="Learn more" service_ids="1,2,3,4,5,6" style="style-1"][/services]'
                    ) .
                    Html::tag(
                        'div',
                        '[intro-video title="Integrate with over 1,000 project management apps" image="general/intro-video.png" tag="Business" youtube_video_url="https://www.youtube.com/watch?v=oRI37cOPBQQ" icon_image="icons/bg-plan.png"][/intro-video]'
                    ) .
                    Html::tag(
                        'div',
                        '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="icons/bg-plan.png" button_secondary_label="Compare Plans" button_secondary_url="pricing" style="style-1" package_ids="1,2,3,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[faqs title="Frequently asked questions" subtitle="Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help" button_primary_label="Contact Us" button_primary_url="contact" button_secondary_label="Support Center" button_secondary_url="contact" image="general/bg-faqs.png" faq_category_ids="1,2,3,4"][/faqs]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our customers are saying" subtitle="Hear from our users who have saved thousands on their Startup and SaaS solution spend" image="general/plants-1.png" limit="4"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="blog" type="featured" limit="5"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 2',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="Iori dashboard will help your payments fast and secure" subtitle="Social media networks are open to all. Social media is typically used for social interaction and access to news and information, and decision making." banner_primary="general/banner.png" button_secondary_label="Learn more" platform_google_play_logo="general/appstore-btn.png" platform_apple_store_logo="general/google-play-btn.png" style="style-2"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers, Trusted By Enterprises" quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="yes" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="yes" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="yes" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="yes" style="style-2"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[why-choose-us title="See why we are trusted the world over" subtitle="Why choose us?" description="Necessary to deliver white glove, fully managed campaigns that surpass industry benchmarks.Take your career to next level. Apply to our team and see what we can do together. You’re good enough. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature Id pro doctus mediocrem erroribus, diam nostro sed cu. Ea pri graeco tritani partiendo. Omittantur No tale choro fastidii his, pri cu epicuri perpetua. Enim dictas omittantur et duo, vocent lucilius quaestio mea ex. Ex illum officiis id" button_primary_label="Download App" button_primary_url="/app" button_secondary_label="Learn more" button_secondary_url="/contact" quantity="4" title_1="Social followers" data_1="469k" title_2=" Happy Clients" data_2="5000+" color_2="bg-brand-2" title_3=" Project Done" data_3="756+" color_3="bg-2" title_4="Client Satisfaction" data_4="100%" color_4="bg-4"][/why-choose-us]'
                    ) .
                    Html::tag(
                        'div',
                        '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="logo/finger.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Compare Plans" button_secondary_url="/pricing" style="style-1" package_ids="1,2,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our customers are saying" subtitle="Hear from our users who have saved thousands on their Startup and SaaS solution spend" image="general/customer.png" limit="4" style="style-2"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[get-in-touch title="Want to talk to a marketing expert?" subtitle="Get In Touch" description="You need to create an account to find the best and preferred job. lorem Ipsum is simply dummy text of the printing and typesetting industry the standard dummy text ever took." image="general/img-marketing.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Support Center" button_secondary_url="/contact"][/get-in-touch]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aeneas velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ) .
                    Html::tag(
                        'div',
                        '[how-to-start title="Bring your target users together on social media" subtitle="How to start ?" image="general/banner-how-to-start.png" image_icon_primary="icons/certify.png" image_icon_secondary="icons/fly.png" quantity="3" title_1="Create an account" description_1="What makes us different from others? We give holistic solutions with strategy, design & technology." title_2="Build your founding team" description_2="What makes us different from others? We give holistic solutions with strategy, design & technology." title_3="Launch and Scale" description_3="What makes us different from others? We give holistic solutions with strategy, design & technology."][/how-to-start]'
                    ) .
                    Html::tag(
                        'div',
                        '[marketing-features title="Take your social media marketing prowess to the next level" quantity="6" title_1="Cross-Platform" icon_image_1="icons/cross-platform.png" description_1="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_1="Learn More" url_1="/contact" type_1="enterprise" title_2="Social Media" icon_image_2="icons/cross-platform.png" description_2="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe" label_2="Learn More" url_2="/contact" type_2="personal" title_3="Brand Identity" icon_image_3="icons/social-media.png" description_3="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_3="Learn More" url_3="/contact" type_3="enterprise" title_4="Customer Service" icon_image_4="icons/trial-plan.png" description_4="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_4="Learn More" url_4="/contact" type_4="personal" title_5="Social advertising" icon_image_5="icons/standard.png" description_5="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_5="Learn More" url_5="/contact" type_5="personal" title_6="Content creation" icon_image_6="icons/business.png" description_6="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_6="Learn More" url_6="/contact" type_6="enterprise"][/marketing-features]'
                    ) .
                    Html::tag(
                        'div',
                        '[what-we-do title="We facilitate the creation of strategy and design" subtitle="What We Do, What You Get" button_primary_label="Download App" button_primary_url="/contact" button_secondary_label="Learn more" button_secondary_url="/contact" quantity="5" title_1="Smart Installation Tools" icon_image_1="icons/we-do.png" description_1="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_1="Learn More" url_1="/contact" title_2="Manage budgets and resources" icon_image_2="icons/case-study.png" description_2="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_2="Learn More" url_2="/contact" title_3=" Employee Assessments" icon_image_3="icons/write.png" description_3="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_3="Learn More" url_3="/contact" title_4=" Collaborative to the core." icon_image_4="icons/user.png" description_4="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_4="Learn More" url_4="/contact" title_5=" Unlimited ways to work" icon_image_5="icons/unlimited.png" description_5="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_5="Learn More" url_5="/contact"][/what-we-do]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 3',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="Grow your online business now" subtitle="Get Started" banner_primary="general/banner-homepage-3.png" banner_image_1="general/chart2.png" banner_image_2="general/chart1.png" banner_image_3="general/chart.png" button_primary_label="Play Video" button_primary_url="contact" style="style-3"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="yes" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="yes" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="yes" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="yes" style="style-3"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[what-we-do title="We facilitate the creation of strategy and design" subtitle="What We Do, What You Get" button_primary_label="Download App" button_primary_url="/contact" button_secondary_label="Learn more" button_secondary_url="/contact" quantity="5" title_1="Smart Installation Tools" icon_image_1="icons/we-do.png" description_1="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_1="Learn More" url_1="/contact" title_2="Manage budgets and resources" icon_image_2="icons/case-study.png" description_2="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_2="Learn More" url_2="/contact" title_3=" Employee Assessments" icon_image_3="icons/write.png" description_3="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_3="Learn More" url_3="/contact" title_4=" Collaborative to the core." icon_image_4="icons/user.png" description_4="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_4="Learn More" url_4="/contact" title_5=" Unlimited ways to work" icon_image_5="icons/unlimited.png" description_5="Your site is not complete with only landings. Get essential inner pages using our ready demos." label_5="Learn More" url_5="/contact"][/what-we-do]'
                    ) .
                    Html::tag(
                        'div',
                        '[site-statistics title="See why we are trusted the world over" quantity="4" title_1="Social followers" data_1="469" unit_1="K" title_2="Happy Clients" data_2="255" unit_2="K+" title_3="Project Done" data_3="756" unit_3="K" title_4="Global branch" data_4="120"][/site-statistics]'
                    ) .
                    Html::tag(
                        'div',
                        '[how-it-work title="Grow your online business now" subtitle="How it work" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go. " button_primary_label="Download App" button_primary_url="/app" button_secondary_label="Learn more" button_secondary_url="/contact" quantity="8" title_1="Cross-Platform" description_1="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." icon_image_1="icons/cross-platform.png" label_1="Learn More" url_1="/contact" display_1="show_full" title_2="Social Media" description_2="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." icon_image_2="icons/social-media.png" label_2="Learn More" url_2="/contact" display_2="show_full" title_3="Certification" icon_image_3="icons/certification.png" url_3="/contact" display_3="show_title" title_4="Conference" icon_image_4="icons/conference.png" url_4="/contact" display_4="show_title" title_5="Research" icon_image_5="icons/research.png" url_5="/contact" display_5="show_title" title_6="Dispersal" icon_image_6="icons/cross-platform.png" url_6="/contact" display_6="show_title" title_7="Enterprise" icon_image_7="icons/research.png" url_7="/contact" display_7="show_title" title_8="Team Building" icon_image_8="general/img-marketing.png" url_8="/contact" display_8="show_title"][/how-it-work]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our clients say about us" subtitle="Testimonials" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go." limit="4" style="style-3"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 4',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="Start for free Pay as you Grow" subtitle="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss." button_secondary_label="Learn more" button_secondary_url="/contact" platform_google_play_logo="general/google.png" platform_google_play_url="https://play.google.com/store/games" platform_apple_store_logo="general/apple.png" platform_apple_store_url="https://www.apple.com/vn/app-store/" style="style-5"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers Trusted By Enterprises" subtitle="We helped these brands turn online assessments into success stories." quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="yes" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="yes" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="yes" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="yes" style="style-4"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[branding-block title="Build your brand and reach out to social followers" subtitle="Branding" description="Sharing content online allows you to craft an online persona that reflects your personal values and professional skills. Even if you only use social media occasionally, what you create, share or react to feeds into this public narrative. How you conduct yourself online is now just as important as your behavior offline especially when it comes to your digital marketing career." image="general/follower.png" logo="icons/certify.png" button_primary_label="Download App" button_primary_url="https://www.apple.com/sg/app-store/" button_secondary_label="Learn more" button_secondary_url="/contact" quantity="6" title_1="Send & Schedule Posts" title_2="Push Notification" title_3="Online Visitors" title_4="Live Chat Request" title_5="Create fully integrated campaigns" title_6="Directly send or schedule posts"][/branding-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[site-statistics title="See why we are trusted the world over" quantity="4" title_1="Social followers" data_1="469" unit_1="K" title_2="Happy Clients" data_2="255" unit_2="K+" title_3="Project Done" data_3="756" unit_3="K" title_4="Global branch" data_4="120"][/site-statistics]'
                    ) .
                    Html::tag(
                        'div',
                        '[services title="What We Offer" subtitle="What makes us different from others? We give holistic solutions with strategy, design & technology." button_primary_label="Download App" button_primary_url="https://www.apple.com/sg/app-store/" button_secondary_label="Learn more" button_secondary_url="contact" service_ids="1,2,3,4,5,6" style="style-2"][/services]'
                    ) .
                    Html::tag(
                        'div',
                        '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="icons/bg-plan.png" button_secondary_label="Compare Plans" button_secondary_url="pricing" style="style-1" package_ids="1,2,3,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[faqs title="Frequently asked questions" subtitle="Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help" button_primary_label="Contact Us" button_primary_url="contact" button_secondary_label="Support Center" button_secondary_url="contact" image="general/bg-faqs.png" faq_category_ids="1,2,3,4"][/faqs]'
                    ) .
                    Html::tag(
                        'div',
                        '[intro-video title="Integrate with over 1,000 project management apps" subtitle="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. " image="general/img-video-2.png" tag="Business" youtube_video_url="https://www.youtube.com/watch?v=oRI37cOPBQQ" icon_image="icons/bg-plan.png" style="style-2"][/intro-video]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our customers are saying" subtitle="Hear from our users who have saved thousands on their Startup and SaaS solution spend" image="general/customer.png" limit="4" style="style-2"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 5',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="#1 Intelligence Software to Accelerate Your SaaS Sales" subtitle="Great sales platform" description="We’re lively, not corporate. We have the energy and boldness of a startup and the expertise and pragmatism of a scale-up. All in one place." top_description="Discover powerful features to boost your productivit. You are always welcome to visit our little den. Professional in teir craft! All products were super amazing with strong attension to details, comps and overall vibe." banner_primary="general/banner-homepage-5.png" quantity="2" title_1="Connected" url_1="/contact" image_1="icons/free.png" description_1="We come together wherever we are – across time zones, regions, offices and screens. You will receive support from your teammates anytime and anywhere." title_2="Flexible" url_2="/contact" image_2="icons/identity.png" description_2="We believe in your freedom to work when and how you work best, to help us all thrive. Only freedom and independent work can bring out the best in you." style="style-6"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="yes" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="yes" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="yes" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="yes" style="style-5"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[marketing-features title="Take your social media marketing prowess to the next level" style="style-2" quantity="6" title_1="Cross-Platform" icon_image_1="icons/cross-platform.png" description_1="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_1="Learn More" url_1="/contact" type_1="enterprise" title_2="Social Media" icon_image_2="icons/cross-platform.png" description_2="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe" label_2="Learn More" url_2="/contact" type_2="personal" title_3="Brand Identity" icon_image_3="icons/social-media.png" description_3="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_3="Learn More" url_3="/contact" type_3="enterprise" title_4="Customer Service" icon_image_4="icons/trial-plan.png" description_4="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_4="Learn More" url_4="/contact" type_4="personal" title_5="Social advertising" icon_image_5="icons/standard.png" description_5="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_5="Learn More" url_5="/contact" type_5="personal" title_6="Content creation" icon_image_6="icons/business.png" description_6="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_6="Learn More" url_6="/contact" type_6="enterprise"][/marketing-features]'
                    ) .
                    Html::tag(
                        'div',
                        '[business-strategy title="Integrate with over 1,000 project management apps" subtitle="Business" image="general/img-project.png" icon_image="general/chart-homepage-5.png" description="Business" quantity="6" title_1="Happy Clients" title_2="Project Done" title_3="Global branch" title_4="Create task dependencies" title_5="hare files, discuss" title_6="Track time spent on each project" counter_number_1="17" counter_label_1="Happy Clients" counter_number_2="516" counter_label_2="Project Done" counter_number_3="68" counter_label_3="Global branch"][/business-strategy]'
                    ) .
                    Html::tag(
                        'div',
                        '[grow-business title="Grow your online business now" subtitle="Business" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go" image="general/img-project2.png" icon_image="logo/finger.png" button_primary_label="Download App" button_primary_url="/app" button_secondary_label="Learn more" button_secondary_url="/contact"][/grow-business]'
                    ) .
                    Html::tag(
                        'div',
                        '[site-statistics title="See why we are trusted the world over" quantity="4" title_1="Social followers" data_1="469" unit_1="K" title_2="Happy Clients" data_2="255" unit_2="K+" title_3="Project Done" data_3="756" unit_3="K" title_4="Global branch" data_4="120"][/site-statistics]'
                    ) .
                    Html::tag(
                        'div',
                        '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="general/icons/bg-plan.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Compare Plans" button_secondary_url="/pricing" style="style-2" package_ids="1,2,3,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="blog" type="featured" limit="5"][/from-our-blog]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services quantity="3" title_1="Knowledge Base" description_1="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_1="icons/document.png" action_1="/contact" label_1="Get Started" title_2="Community Forums" description_2="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_2="icons/forums.png" action_2="/contact" label_2="Get Started" title_3="Documentation" description_3="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_3="icons/knowledge.png" action_3="/contact" label_3="Get Started"][/featured-services]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 6',
                'content' =>
                   Html::tag(
                       'div',
                       '[hero-banner title="Innovative Solution to Move Your Business Forward" subtitle="Think. Creative. Solve" description="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss." banner_primary="general/banner-homepage-6.png" button_secondary_label="Learn more" button_secondary_url="/contact" platform_google_play_logo="general/google.png" platform_google_play_url="https://play.google.com/store" platform_apple_store_logo="general/apple.png" platform_apple_store_url="https://www.apple.com/store" quantity="2" image_1="general/testimonial.png" image_2="general/testimonial1.png" style="style-7"][/hero-banner]'
                   ) .
                   Html::tag(
                       'div',
                       '[featured-brands quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="yes" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="yes" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="yes" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="yes" style="style-5"][/featured-brands]'
                   ) .
                   Html::tag(
                       'div',
                       '[connect-with-us title="Crafting human connection through digital experience" description="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." button_label="Contact Us" button_url="/contact" quantity="3" title_1="Cross Platform" image_1="general/connect-with-us-1.png" description_1="Aut architecto consequatur sit error nemo sed dolorum suscipit 33 impedit dignissimos ut velit blanditiis qui quos magni id dolore dignissimos. Sit ipsa consectetur et sint harum et dicta consequuntur id cupiditate perferendis qui quisquam enim. Vel autem illo id error excepturi est dolorum voluptas qui maxime consequatur et culpa quibusdam in iusto vero sit amet Quis." title_2="Cross Platform" image_2="general/connect-with-us-2.png" description_2="Vel tenetur officiis ab reiciendis dolor aut quae doloremque est ipsum natus et consequatur animi aut sunt dolores ut quasi rerum. Aut velit velit id quasi velit eum reiciendis laudantium quo galisum incidunt aut velit animi hic temporibus blanditiis sit odit iure. Eum laborum dolores ea molestias fuga qui temporibus accusantium qui soluta aliquid ab vero soluta." title_3="Cross Platform" image_3="general/connect-with-us-3.png" description_3="Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature Id pro doctus mediocrem erroribus, diam nostro sed cu. Ea pri graeco tritani partiendo. Omittantur No tale choro fastidii his, pri cu epicuri perpetua. Enim dictas omittantur et duo, vocent lucilius quaestio mea ex. Ex illum officiis id."][/connect-with-us]'
                   ) .
                   Html::tag(
                       'div',
                       '[services title="What We Offer" subtitle="What makes us different from others? We give holistic solutions with strategy, design & technology." button_primary_label="Download App" button_primary_url="https://www.apple.com/sg/app-store/" button_secondary_label="Learn more" button_secondary_url="contact" service_ids="1,2,3,4,5,6" style="style-3"][/services]'
                   ) .
                   Html::tag(
                       'div',
                       '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="icons/bg-plan.png" button_secondary_label="Compare Plans" button_secondary_url="pricing" style="style-1" package_ids="1,2,3,4"][/pricing-plan]'
                   ) .
                   Html::tag(
                       'div',
                       '[get-in-touch title="Want to talk to a marketing expert?" subtitle="Get In Touch" description="You need to create an account to find the best and preferred job. lorem Ipsum is simply dummy text of the printing and typesetting industry the standard dummy text ever took." image="general/img-marketing.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Support Center" button_secondary_url="/contact"][/get-in-touch]'
                   ) .
                   Html::tag(
                       'div',
                       '[faqs title="Frequently asked questions" subtitle="Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help" faq_category_ids="1,2,3,4" style="style-2" quantity="3" image_1="accounts/author.png" image_2="accounts/author2.png" image_3="accounts/author3.png"][/faqs]'
                   ) .
                   Html::tag(
                       'div',
                       '[featured-services quantity="3" title_1="Knowledge Base" description_1="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_1="icons/knowledge.png" action_1="/contact" label_1="Get Started" title_2="Community Forums" description_2="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_2="icons/forums.png" action_2="/contact" label_2="Get Started" title_3="Documentation" description_3="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_3="icons/document.png" action_3="/contact" label_3="Get Started"][/featured-services]'
                   ) .
                   Html::tag(
                       'div',
                       '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                   ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 7',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="We take care of your business to grow" subtitle="Think. Creative. Solve" description="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss." customer_ids="2,5" customer_description="Join thousands of users in using the iori platform!" quantity="6" image_1="general/banner-homepage-7-1.png" image_2="general/banner-homepage-7-2.png" image_3="general/banner-homepage-7-3.png" image_4="general/banner-homepage-7-4.png" image_5="general/banner-homepage-7-5.png" image_6="general/banner-homepage-7-6.png" style="style-8"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands-with-counter title="See why we are trusted the world over" quantity="6,6" number_1="753" name_1="Project Done" number_2="100" name_2="Global branch" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/4.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/6.png" url_3="https://kippa.africa/" is_open_new_tab_3="no" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="yes" title_5="Reedelsevier" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="yes" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="yes"][/featured-brands-with-counter]'
                    ) .
                    Html::tag(
                        'div',
                        '[technology-block block_left_title="Financial Management" block_left_description="Track, manage, and control your expenses. The only financial management tool you’ll ever need." google_play_logo="general/google.png" google_play_url="https://play.google.com/store" apple_store_logo="general/apple.png" apple_store_url="https://www.apple.com/store" block_left_image="general/img-financial.png" block_right_title="Automated Platform" block_right_description="Synchronize and automate all your business in the cloud. Save time and effort, enjoy great vacations." button_label="Get Started Now" button_url="/contact" block_right_image="general/automated.png"][/technology-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[how-to-start title="Bring your target users together on social media" subtitle="IORI Business Platform" image="general/banner-how-to-start.png" image_icon_primary="icons/certify.png" image_icon_secondary="icons/fly.png" style="style-2" quantity="3" title_1="Create an account" description_1="What makes us different from others? We give holistic solutions with strategy, design & technology." title_2="Build your founding team" description_2="What makes us different from others? We give holistic solutions with strategy, design & technology." title_3="Launch and Scale" description_3="What makes us different from others? We give holistic solutions with strategy, design & technology."][/how-to-start]'
                    ) .
                    Html::tag(
                        'div',
                        '[branding-block title="Business can also be simple" subtitle="Automatic Tools" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go." image="general/branding-image.png" logo="general/testimonial1.png" button_primary_label="Download App" button_primary_url="https://play.google.com/store" button_secondary_label="Learn more" button_secondary_url="/contact" counter_title="Happy Clients" counter_data="25" counter_unit="K+" quantity="6" title_1="Task tracking" title_2="Task visualization" title_3="Meet deadlines faster" title_4="Create task dependencies" title_5="hare files, discuss" title_6="Track time spent on each project" style="style-2"][/branding-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services quantity="3" title_1="Payment" description_1="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_1="icons/payment.png" action_1="/contact" label_1="Learn More" title_2="Save money" description_2="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_2="icons/money.png" action_2="/contact" label_2="Learn More" title_3="Quick support" description_3="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_3="icons/support.png" action_3="/contact" label_3="Learn More" style="style-2"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        '[teams title="Meet the amazing team behind Iori" subtitle="Our leadership team" team_ids="1,2,3,5"][/teams]'
                    ) .
                    Html::tag(
                        'div',
                        '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="icons/bg-plan.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Compare Plans" button_secondary_url="/pricing" style="style-2" package_ids="1,2,3,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our loving users are saying about us" limit="5" style="style-5"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 8',
                'content' =>
                    Html::tag(
                        'div',
                        '[banner-hero-with-teams title="Think. Creative. Solve" subtitle="Innovative Solution to Move Your Business Forward" description="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss." google_play_logo="general/google.png" google_play_url="https://play.google.com/store" apple_store_logo="general/apple.png" apple_store_url="https://www.apple.com/store" team_ids="1,2,3,4,5"][/banner-hero-with-teams]'
                    ) .
                    Html::tag(
                        'div',
                        '[why-using-your-app title="Our app is great for individuals, startups and enterprises. It have never been easier to manage your finances" subtitle="Why using our app" description="Eos eveniet nesciunt et accusamus suscipit est magnam consequatur aut quisquam perferendis a reprehenderit quis aut voluptatem repellat est beatae reiciendis? Cum omnis corrupti cum incidunt veritatis vel libero provident aut reiciendis animi ut quod quaerat et velit animi et omnis illo. Sit quae harum eos incidunt sequi eum iste fugit ex omnis aliquam a explicabo quam." image_1="general/phone1.png" image_2="general/phone2.png" testimonial_id="1"][/why-using-your-app]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers, Trusted By Enterprises" quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="no" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="no" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="no" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="no" style="style-2"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[business-statistics title="Our app is great for individuals, startups and enterprises. It have never been easier to manage your finances" subtitle="Why using our app" description="Eos eveniet nesciunt et accusamus suscipit est magnam consequatur aut quisquam perferendis a reprehenderit quis aut voluptatem repellat est beatae reiciendis? Cum omnis corrupti cum incidunt veritatis vel libero provident aut reiciendis animi ut quod quaerat et velit animi et omnis illo. Sit quae harum eos incidunt sequi eum iste fugit ex omnis aliquam a explicabo quam." image_1="general/chart.png" image_2="general/chart1.png" image_3="general/chart2.png" testimonial_ids="1,3" quantity="3" title_1="Project Done" data_1="592" unit_1="+" title_2="Social followers" data_2="242" unit_2="K" title_3="Happy Clients" data_3="12" unit_3="K+"][/business-statistics]'
                    ) .
                    Html::tag(
                        'div',
                        '[everything-will-become-one title="Everything will become One" subtitle="Iori Platformlets you take control of your money, balance your income and expenses, and understand where your money goes." image="general/phone-app.png" quantity="8" title_1="Total control" image_1="icons/icon1.png" description_1="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque" title_2="Rapid experimentation" image_2="icons/icon2.png" description_2="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque" title_3="Secure transfer" image_3="icons/icon3.png" description_3="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque" title_4="Activity statistics" image_4="icons/icon4.png" description_4="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque" title_5="Track your spending" image_5="icons/icon5.png" description_5="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque" title_6="Fast Response" image_6="icons/icon6.png" description_6="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque" title_7="AI automation" image_7="icons/icon7.png" description_7="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque" title_8="Budget that works" image_8="icons/icon8.png" description_8="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus malesuada felis eget finibus placerat. Aliquam sit amet vestibulum felis, sit amet porta neque"][/everything-will-become-one]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services title="Why You Should Consider Installing" subtitle="We’re lively, not corporate. We have the energy and boldness of a startup and the expertise and pragmatism of a scale-up. All in one place." quantity="4" title_1="Connected" description_1="We come together wherever we are – across time zones, regions, offices and screens. You will receive support from your teammates anytime and anywhere." image_1="icons/free.png" action_1="/contact" title_2="Inclusive" description_2="Our teams reflect the rich diversity of our world, with equitable access to opportunity for everyone. No matter where you come from" image_2="icons/cross-platform.png" action_2="/contact" title_3="Flexible" description_3="We believe in your freedom to work when and how you work best, to help us all thrive. Only freedom and independent work can bring out the best in you." image_3="icons/identity.png" action_3="/contact" title_4="Persuasion" description_4="Knowing that there is real value to be gained from helping people to simplify whatever it is that they do and bring." image_4="icons/persuasion.png" action_4="/contact" style="style-3"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our customers are saying" subtitle="Hear from our users who have saved thousands on their Startup and SaaS solution spend." limit="5" style="style-6"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 9',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="Promotes your business no matter what you do" subtitle="Get Started" youtube_video_url="https://www.youtube.com/watch?v=v2qeqkKgw7U" description="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss. banner_primary="general/banner-homepage-9.png" button_youtube_label="Play video" customer_ids="2,4,5,7,9" customer_description="Join thousands of users in using the iori platform!" quantity="3" title_1="Unlimited design & dev requests" title_2="No Card. No Contract. Cancel anytime" title_3="Monthly flat-rate. Support 24/7" style="style-9"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[technology-block title="Crafting human connection through digital experience" description="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." block_left_title="Social Media Platform" block_left_description="Manage your media channels professionally and efficiently. Real-time and automatic reporting system." google_play_logo="general/google.png" google_play_url="https://play.google.com/store" apple_store_logo="general/apple.png" apple_store_url="https://www.apple.com/vn/app-store/" block_left_image="general/social-homepage.png" block_right_title="Automated Platform" block_right_description="Synchronize and automate all your business in the cloud. Save time and effort, enjoy great vacations." button_label="Get Started Now" button_url="/contact" block_right_image="general/platform-social.png"][/technology-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[branding-block title="Business can also be simple" subtitle="Automatic Tools" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go." image="general/image-branding.png" logo="general/testimonial.png" button_primary_label="Help Center" button_primary_url="/contact" button_secondary_label="Learn more" button_secondary_url="/contact" counter_title="Happy Clients" counter_data="25" counter_unit="K+" quantity="6" title_1="Task tracking" title_2="Task visualization" title_3="Meet deadlines faster" title_4="Create task dependencies" title_5="hare files, discuss" title_6="Track time spent on each project" style="style-3"][/branding-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[marketing-features title="Take your social media marketing prowess to the next level" quantity="6" title_1="Cross-Platform" icon_image_1="icons/cross-platform.png" description_1="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_1="Learn More" url_1="/contact" type_1="enterprise" title_2="Social Media" icon_image_2="icons/cross-platform.png" description_2="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe" label_2="Learn More" url_2="/contact" type_2="personal" title_3="Brand Identity" icon_image_3="icons/social-media.png" description_3="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_3="Learn More" url_3="/contact" type_3="enterprise" title_4="Customer Service" icon_image_4="icons/trial-plan.png" description_4="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_4="Learn More" url_4="/contact" type_4="personal" title_5="Social advertising" icon_image_5="icons/standard.png" description_5="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_5="Learn More" url_5="/contact" type_5="personal" title_6="Content creation" icon_image_6="icons/business.png" description_6="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." label_6="Learn More" url_6="/contact" type_6="enterprise"][/marketing-features]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers, Trusted By Enterprises" subtitle="We helped these brands turn online assessments into success stories. Join them. Elevate your testing." quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="no" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="no" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="no" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="no" style="style-6"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[banner-with-newsletter-form title="Start for free Pay as you Grow" subtitle="Get Started" description="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss." show_newsletter_form="0,1" subtitle_platform="Available on" google_play_logo="general/google.png" google_play_url="https://play.google.com/store" apple_store_logo="general/apple.png" apple_store_url="https://www.apple.com/store" button_url="/contact" button_label="Learn more"][/banner-with-newsletter-form]'
                    ) .
                    Html::tag(
                        'div',
                        '[faqs title="Frequently asked questions" subtitle="Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help" faq_category_ids="1,2,3,4" style="style-3" quantity="1"][/faqs]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services quantity="3" title_1="Knowledge Base" description_1="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_1="icons/knowledge.png" action_1="/contact" label_1="Get Started" title_2="Community Forums" description_2="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_2="icons/forums.png" action_2="/contact" label_2="Get Started" title_3="Documentation" description_3="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_3="icons/document.png" action_3="/contact" label_3="Get Started"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 10',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner-with-site-statistics title="We Are Leading Digital University" description="Enable highly motivating non-cash micropayments and offer in-demand prepaid solutions – with a single connection." banner_image="general/banner-homepage-10.png" button_primary_url="https://play.google.com/store" button_primary_label="Download App" button_secondary_url="/contact" button_secondary_label="Lean More" quantity="4" title_1="Social followers" data_1="469" unit_1="K" title_2="Happy Clients" data_2="25" unit_2="K+" title_3="Project Done" data_3="756" unit_3="+" title_4="Global branch" data_4="100" unit_4="+"][/hero-banner-with-site-statistics]'
                    ) .
                    Html::tag(
                        'div',
                        '[explore-network title="Ready to capture every wonderful moment" subtitle="EXPLORE NETWORK" quantity="4" key_1="Digital Cameras" title_1=" Integrate with over 1,000 project management apps" subtitle_1="Business" description_1="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book" image_1="general/img-tab-1.png" checklists_1="Task tracking,Create task dependencies,Task visualization,hare files, discuss" key_2="Mirrorless Camera" title_2="Integrate with over 1,000 project management apps" subtitle_2="Business" description_2="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book" image_2="general/img-tab-2.png" checklists_2="Task tracking,Create task dependencies,Task visualization" key_3="Travel Camera" title_3="Integrate with over 1,000 project management apps" subtitle_3="Business" description_3="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book" image_3="general/img-tab-3.png" checklists_3="Task tracking,Create task dependencies,Task visualization" key_4="Camera Flashes" title_4="Integrate with over 1,000 project management apps" subtitle_4="Business" description_4="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book" image_4="general/img-tab-4.png" checklists_4="Task tracking,Create task dependencies,Task visualization"][/explore-network]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers, Trusted By Enterprises" subtitle="We helped these brands turn online assessments into success stories. Join them. Elevate your testing." quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="no" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="no" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="no" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="no" style="style-5"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[branding-block title="Build your brand and reach out to social followers" subtitle="Branding" description="Sharing content online allows you to craft an online persona that reflects your personal values and professional skills. Even if you only use social media occasionally, what you create, share or react to feeds into this public narrative. How you conduct yourself online is now just as important as your behavior offline especially when it comes to your digital marketing career." image="general/branding-img-1.png" logo="general/branding-img-2.png" button_primary_label="Download App" button_primary_url="https://play.google.com/store" button_secondary_label="Learn more" button_secondary_url="/contact" quantity="6" title_1="Send & Schedule Posts" title_2="Send & Schedule Posts" title_3="Create fully integrated campaigns" title_4="Push Notification" title_5="Online Visitors" title_6="Directly send or schedule posts" style="style-4"][/branding-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="icons/bg-plan.png" button_secondary_label="Compare Plans" button_secondary_url="pricing" style="style-1" package_ids="1,2,3,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our customers are saying" subtitle="Hear from our users who have saved thousands on their Startup and SaaS solution spend" image="general/customer.png" limit="4" style="style-2"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[intro-video title="Integrate with over 1,000 project management apps" image="general/intro-video.png" tag="Business" youtube_video_url="https://www.youtube.com/watch?v=oRI37cOPBQQ" icon_image="icons/bg-plan.png"][/intro-video]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 11',
                'content' =>
                    Html::tag(
                        'div',
                        '[banner-slider google_play_logo="general/google.png" google_play_url="https://play.google.com/store" apple_store_logo="general/apple.png" apple_store_url="https://www.apple.com/store" quantity="3" title_1="Bring your target users together on social media" description_1="Duis justo nulla, pulvinar at dolor dapibus, finibus cursus massa. Praesent quam diam, faucibus tristique enim in, rhoncus aliquam lorem. Vestibulum vestibulum pellentesque nunc sit amet ullamcorper. Praesent ligula felis" image_1="general/hero-1.png" title_2="Let’s make something great together." description_2="Duis justo nulla, pulvinar at dolor dapibus, finibus cursus massa. Praesent quam diam, faucibus tristique enim in, rhoncus aliquam lorem. Vestibulum vestibulum pellentesque nunc sit amet ullamcorper. Praesent ligula felis" image_2="general/hero-2.png" title_3="Use flexible components to build an app quickly" description_3="Duis justo nulla, pulvinar at dolor dapibus, finibus cursus massa. Praesent quam diam, faucibus tristique enim in, rhoncus aliquam lorem. Vestibulum vestibulum pellentesque nunc sit amet ullamcorper. Praesent ligula felis" image_3="general/hero-3.png"][/banner-slider]'
                    ) .
                    Html::tag(
                        'div',
                        '[site-statistics title="See why we are trusted the world over" description="Et quaerat deserunt et numquam voluptatem et laborum consectetur non consequatur temporibus ea repellat nihil vel consectetur dolores et rerum voluptas. Nam voluptas reiciendis non laborum perspiciatis eum omnis cumque ab impedit earum ex quos porro sit dolorem cupiditate ut ducimus autem." quantity="4" title_1="Social followers" data_1="469" unit_1="K" title_2="Happy Clients" data_2="255" unit_2="K+" title_3="Project Done" data_3="756" unit_3="K" title_4="Global branch" data_4="120" style="style-2"][/site-statistics]'
                    ) .
                    Html::tag(
                        'div',
                        '[services title="What We Offer" subtitle="What makes us different from others? We give holistic solutions with strategy, design & technology." service_ids="1,2,3,4,5,6" style="style-4"][/services]'
                    ) .
                    Html::tag(
                        'div',
                        '[dual-intro-video quantity="2" title_1=" Integrate with over 1,000 project management apps" subtitle_1="Business" description_1="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." image_1="general/intro-video.png" youtube_video_url_1="https://www.youtube.com/watch?v=yCh9OVLI0SU" button_label_1="Play video" title_2="Integrate with over 1,000 project management apps" subtitle_2="Business" description_2="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." image_2="general/intro-video.png" youtube_video_url_2="https://www.youtube.com/watch?v=yCh9OVLI0SU" button_label_2="Play video"][/dual-intro-video]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our loving users are saying about us" limit="5" style="style-5"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[faqs title="Frequently asked questions" subtitle="Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help" faq_category_ids="1,2,3,4" style="style-3" quantity="1"][/faqs]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services quantity="3" title_1="Payment" description_1="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_1="icons/payment.png" action_1="/contact" label_1="Learn More" title_2="Save money" description_2="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_2="icons/money.png" action_2="/contact" label_2="Learn More" title_3="Quick support" description_3="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_3="icons/support.png" action_3="/contact" label_3="Learn More" style="style-2"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        '[teams title="Meet the amazing team behind Iori" subtitle="Our leadership team" team_ids="1,2,3,5"][/teams]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Homepage 12',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title=" Think. Creative. Solve Innovative Solution to Move Your Business Forward" subtitle="Think. Creative. Solve" description="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss." banner_primary="general/members.png" quantity="6" style="style-10"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers, Trusted By Enterprises" subtitle="We helped these brands turn online assessments into success stories. Join them. Elevate your testing." quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="no" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="no" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="no" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="no" style="style-7"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[connect-with-us title="Crafting human connection through digital experience" description="Discover powerful features to boost your productivity. You are always welcome to visit our little den. Professional in their craft! All products were super amazing with strong attention to details, comps and overall vibe." button_label="Contact us" button_url="/contact" quantity="3" title_1="Cross Platform" image_1="general/human1.png" description_1="Discover powerful features to boost your productivity. You are always welcome to visit our little den" title_2="Cross Platform" image_2="general/human2.png" description_2="Discover powerful features to boost your productivity. You are always welcome to visit our little den." title_3="Cross Platform" image_3="general/human3.png" description_3="Discover powerful features to boost your productivity. You are always welcome to visit our little den."][/connect-with-us]'
                    ) .
                    Html::tag(
                        'div',
                        '[how-to-start title="Bring your target users together on social media" subtitle="IORI Business Platform" image="general/banner-how-to-start.png" image_icon_primary="icons/certify.png" image_icon_secondary="icons/fly.png" style="style-2" quantity="3" title_1="Create an account" description_1="What makes us different from others? We give holistic solutions with strategy, design & technology." title_2="Build your founding team" description_2="What makes us different from others? We give holistic solutions with strategy, design & technology." title_3="Launch and Scale" description_3="What makes us different from others? We give holistic solutions with strategy, design & technology."][/how-to-start]'
                    ) .
                    Html::tag(
                        'div',
                        '[take-the-control title="Create a free account today." subtitle="Take the control" image="general/account.png" title_counter="Social followers" data_counter="469" unit_counter="K" quantity="2" title_1="Personal" image_1="icons/personal.png" description_1="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." title_2="Personal" image_2="icons/building.png" description_2="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."][/take-the-control]'
                    ) .
                    Html::tag(
                        'div',
                        '[step-block title="Core values" subtitle="We break down barriers so teams can focus on what matters – working together to create products their customers love." button_label="Get Started Now" button_url="/contact" quantity="6" title_1="Customers First" description_1="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers" title_2="Act With Integrity" description_2="We’re honest, transparent and committed to doing what’s best for our customers and our company. We openly collaborate in pursuit of the truth. We have no tolerance for politics, hidden agendas or passive-aggressive behavior." title_3="Make a Difference Every Day" description_3="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers." title_4="Think Big" description_4="Being the world’s leading commerce platform requires unrivaled vision, innovation and execution. We never settle. We challenge our ideas of what’s possible in order to better meet the needs of our customers." title_5=" Do the right thing" description_5="Integrity is the foundation for everything we do. We are admired and respected for our commitment to honesty, trust, and transparency." title_6="Stronger united" description_6="We’ve created a positive and inclusive culture that fosters open, honest, and meaningful relationships."][/step-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[get-in-touch title="Want to talk to a marketing expert?" subtitle="Get In Touch" description="You need to create an account to find the best and preferred job. lorem Ipsum is simply dummy text of the printing and typesetting industry the standard dummy text ever took." image="general/img-marketing.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Support Center" button_secondary_url="/contact"][/get-in-touch]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services quantity="3" title_1="Daily Updates" description_1="Share updates instantly within our project management software, and get the entire team collaborating" image_1="icons/sync.png" action_1="/contact" label_1="Learn more" title_2="24/7 Support" description_2="Share updates instantly within our project management software, and get the entire team collaborating" image_2="icons/boat-circle.jpg" action_2="/contact" label_2="Learn more" title_3="Weekly Reports" description_3="Share updates instantly within our project management software, and get the entire team collaborating" image_3="icons/report.png" action_3="/contact" label_3="Learn more" style="style-4"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'About Us',
                'content' =>
                    Html::tag(
                        'div',
                        '[who-are-you title="We are a digital agency that tackles all your online challenges." subtitle="Who we are" description="Social media networks are open to all. Social media is typically used for social interation and access to news and information, and decision making." quantity="5" title_1="Social followers" image_1="icons/identity.png" data_1="469" unit_1="K+" title_2="Happy Clients" image_2="icons/cross-platform.png" data_2="25" unit_2="K+" title_3="Project Done" image_3="icons/conference.png" data_3="756" unit_3="+" title_4="Global branch" image_4="icons/certification.png" data_4="100" unit_4="+" title_5="Conference" image_5="icons/dispersal.png" data_5="240" unit_5="+"][/who-are-you]'
                    ) .
                    Html::tag('div', '[testimonials limit="2" style="style-4"][/testimonials]') .
                    Html::tag(
                        'div',
                        '[information title=" Core values" subtitle="We break down barriers so teams can focus on what matters – working together to create products their customers love." quantity="6" title_1="Customers First" description_1="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers." title_2="Act With Integrity" description_2="We’re honest, transparent and committed to doing what’s best for our customers and our company. We openly collaborate in pursuit of the truth. We have no tolerance for politics, hidden agendas or passive-aggressive behavior." title_3=" Make a Difference Every Day" description_3="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers." title_4="Think Big" description_4="Being the world leading commerce platform requires unrivaled vision, innovation and execution. We never settle. We challenge our ideas of what’s possible in order to better meet the needs of our customers." title_5="Do the right thing" description_5="Integrity is the foundation for everything we do. We are admired and respected for our commitment to honesty, trust, and transparency." title_6=" Stronger united" description_6="We’ve created a positive and inclusive culture that fosters open, honest, and meaningful relationships."][/information]'
                    ) .
                    Html::tag(
                        'div',
                        '[box-story quantity="2" title_1="Behind every brand is aninteresting story" subtitle_1="OUR STORY" description_1="Ea nostrum temporibus ex nulla totam qui galisum quae a adipisci modi. In exercitationem culpa sed blanditiis corrupti sit doloremque maxime eos iusto molestiae ex laborum nulla in quas dignissimos 33 dolorum quis." image_1="general/box-image-1.png" title_2="We have a mission to help businesses grow the best with existing conditions" subtitle_2="OUR MISSION" description_2="Ea nostrum temporibus ex nulla totam qui galisum quae a adipisci modi. In exercitationem culpa sed blanditiis corrupti sit doloremque maxime eos iusto molestiae ex laborum nulla in quas dignissimos 33 dolorum quis. Est dolor autem et voluptate autem id enim optio vel incidunt alias." image_2="general/box-image-2.png"][/box-story]'
                    ) .
                    Html::tag('div', '[teams team_ids="1,2,3,4,6"][/teams]') .
                    Html::tag(
                        'div',
                        '[get-in-touch title="Want to talk to a marketing expert?" subtitle="Get In Touch" description="You need to create an account to find the best and preferred job. lorem Ipsum is simply dummy text of the printing and typesetting industry the standard dummy text ever took." image="general/img-marketing.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Support Center" button_secondary_url="/contact"][/get-in-touch]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our clients say about us" subtitle="Testimonials" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go." limit="3" style="style-3"][/testimonials]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Blog',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="All the important insights, guidance and news you need to know." subtitle="Keep up-to-date with all our latest company news and business content. The latest news, tips and advice to help you run your business with less fuss" banner_primary="general/banner-blog.png" style="style-4"][/hero-banner]'
                    ) .
                    Html::tag('div', '[featured-post title="Latest Articles" category_ids="1,2,3,4,5,6"][/featured-post]') .
                    Html::tag('div', '[post-category title="E-Commerce" category_id="1" limit="5"][/post-category]') .
                    Html::tag(
                        'div',
                        '[post-category title="Industry Use Cases" category_id="6" limit="5" style="style-2"][/post-category]'
                    ) .
                    Html::tag(
                        'div',
                        '[post-category title="Marketing Strategy" category_id="7" limit="5"][/post-category]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Contact',
                'content' =>
                    Html::tag(
                        'div',
                        '[contact-page-banner title="We’d love to hear from you" subtitle="Get in Touch" description="Request a demo, ask a question, or get in touch here. If you’re interested in working at Iori Corporation, check out our {{careers page}}." button_label="Learn More" button_url="/about-us" banner="general/contact-banner.png" quantity="2" title_1="Appstore" image_1="general/apple.png" title_2="Googleplay" image_2="general/google.png"][/contact-page-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[contact-information quantity="4" title_1="Help & support" email_1="support@archielite.com" description_1="For help with a current product or service or refer to FAQs and developer tools" image_1="icons/headphone.png" title_2="Call Us" phone_2="(+01) 234 567 89, (+01) 456 789 21" description_2="Call us to speak to a member of our team." image_2="icons/phone.png" title_3="Business Department" phone_3="(+01) 789 456 23" description_3="Contact the sales department about cooperation projects" image_3="icons/chart-1.png" title_4="Global branch" phone_4="(+01) 456 789 23, (+01) 456 789 23" description_4="Contact us to open our branches globally." image_4="icons/earth.png"][/contact-information]'
                    ) .
                    Html::tag(
                        'div',
                        '[contact-form title="Get in touch" subtitle="Do you want to know more or contact our sales department?" title_button="Send Message" quantity="3" heading_1="Visit the Knowledge Base" description_1="Browse customer support articles and step-by-step instructions for specific features." icon_1="icons/img1.png" heading_2="Watch Product Videos" description_2="Watch our video tutorials for visual walkthrough on how to use our features." icon_2="icons/img2.png" heading_3="Get in touch with Sales" description_3="Let us talk about how we can help your enterprise." icon_3="icons/img3.png"][/contact-form]'
                    ) .
                    Html::tag(
                        'div',
                        '[faqs title="Frequently asked questions" subtitle="Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help" button_label="Contact Us" button_url="/contact" button_secondary_label="Support Center" button_secondary_url="contact" faq_category_ids="1,2,3,4" style="style-1" quantity="1"][/faqs]',
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Coming Soon',
                'content' =>
                    Html::tag(
                        'div',
                        '[coming-soon title="We are coming soon" subtitle="Under Construction" description="Our design projects are fresh and simple and will benefit your business greatly. Learn more about our work!" time="2025-05-19" enable_snow_effect="0" background_image="icons/coming-soon.png"][/coming-soon]'
                    ) .
                    Html::tag(
                        'div',
                        '[contact-information quantity="4" title_1="Help & support" email_1="support@archielite.com" description_1="For help with a current product or service or refer to FAQs and developer tools" image_1="icons/headphone.png" title_2="Call Us" phone_2="(+01) 234 567 89, (+01) 456 789 21" description_2="Call us to speak to a member of our team." image_2="icons/phone.png" title_3="Business Department" phone_3="(+01) 789 456 23" description_3="Contact the sales department about cooperation projects" image_3="icons/chart-1.png" title_4="Global branch" phone_4="(+01) 456 789 23, (+01) 456 789 23" description_4="Contact us to open our branches globally." image_4="icons/earth.png"][/contact-information]'
                    ),
            ],
            [
                'name' => 'Services',
                'content' =>
                    Html::tag(
                        'div',
                        '[hero-banner title="Advanced analytics to grow your business" subtitle="Available on" description="Collaborate, plan projects and manage resources with powerful features that your whole team can use. The latest news, tips and advice to help you run your business with less fuss." banner_primary="general/banner-services.png" platform_google_play_logo="general/google.png" platform_google_play_url="https://play.google.com/store/" platform_apple_store_logo="general/apple.png" platform_apple_store_url="https://apps.apple.com/vn/app/apple-store" quantity="6" style="style-11"][/hero-banner]'
                    ) .
                    Html::tag(
                        'div',
                        '[services title="What We Offer" subtitle="What makes us different from others? We give holistic solutions with strategy, design & technology." button_primary_label="Download App" button_primary_url="https://www.apple.com/sg/app-store/" button_secondary_label="Learn more" button_secondary_url="contact" service_ids="1,2,3,4,5,6" style="style-3"][/services]'
                    ) .
                    Html::tag(
                        'div',
                        '[branding-block title="Business can also be simple" subtitle="Automatic Tools" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go." image="general/brand-services-1.png" image_1="general/brand-services-2.png" image_2="general/brand-services-3.png" logo="general/testimonial1.png" button_primary_label="Download App" button_primary_url="https://play.google.com/store" button_secondary_label="Learn more" button_secondary_url="/contact" counter_title="Happy Clients" counter_data="25" counter_unit="K+" counter_title_1="Social followers" counter_data_1="125" counter_unit_1="K" quantity="6" title_1="Task tracking" title_2="Task visualization" title_3="Meet deadlines faster" title_4="Create task dependencies" title_5="hare files, discuss" title_6="Track time spent on each project" style="style-5"][/branding-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[pricing-plan title="Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="icons/bg-plan.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Compare Plans" button_secondary_url="/pricing" style="style-2" package_ids="1,2,3,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Help Center',
                'content' =>
                    Html::tag(
                        'div',
                        '[banner-hero-with-search title="How can we help you?" subtitle="Support Center" suggested="guest users, create account, invoice, security" description="Search here to get answers to your questions" image_1="general/banner-help-center-1.png" image_2="general/banner-help-center-2.png"][/banner-hero-with-search]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services quantity="3" title_1="Knowledge Base" description_1="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_1="icons/document.png" action_1="/contact" label_1="Get Started" title_2="Community Forums" description_2="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_2="icons/forums.png" action_2="/contact" label_2="Get Started" title_3="Documentation" description_3="Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis a libero tempus" image_3="icons/knowledge.png" action_3="/contact" label_3="Get Started"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        '[services title="What We Offer" subtitle="What makes us different from others? We give holistic solutions with strategy, design & technology." button_primary_label="Download App" button_primary_url="https://www.apple.com/sg/app-store/" button_secondary_label="Learn more" button_secondary_url="contact" service_ids="1,2,3,4,5,6" style="style-3"][/services]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-community-forums title="From Community Forums" subtitle="Updated on September 24, 2023" quantity="6" title_1=" Announcements" description_1="Seamless importing and round-tripping of Microsoft Project plans, Excel files & CSV files." image_1="icons/cross-platform.png" topics_1="3" comments_1="16" account_1="1" title_2="iori User Feedback" description_2="Seamless importing and round-tripping of Microsoft Project plans, Excel files & CSV files." image_2="icons/creation.png" topics_2="3" comments_2="19" account_2="3" title_3="Technology support center" description_3="Seamless importing and round-tripping of Microsoft Project plans, Excel files & CSV files." image_3="icons/cross-platform.png" topics_3="5" comments_3="9" account_3="1" title_4=" Product Support" description_4="Seamless importing and round-tripping of Microsoft Project plans, Excel files & CSV files." image_4="icons/cross-platform.png" topics_4="5" comments_4="7" account_4="3" title_5=" Cognitive Solution" description_5="Seamless importing and round-tripping of Microsoft Project plans, Excel files & CSV files." image_5="icons/cross-platform.png" topics_5="6" comments_5="2" account_5="4" title_6="Market research" description_6="Seamless importing and round-tripping of Microsoft Project plans, Excel files & CSV files." image_6="icons/certification.png" topics_6="2" comments_6="1" account_6="5"][/from-community-forums]'
                    ) .
                    Html::tag(
                        'div',
                        '[get-in-touch title="Can’t find an answer?" subtitle="More help" description="Make use of a qualified tutor to get the answer" image="general/answer.png" button_primary_label="Asked a Question" button_primary_url="/help-center" button_secondary_label="Contact Us" button_secondary_url="/contact"][/get-in-touch]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Pricing',
                'content' =>
                    Html::tag(
                        'div',
                        '[pricing-plan title="Finger Choose The Best Plan" subtitle="Pick your plan. Change whenever you want. No switching fees between packages" icon_image="icons/bg-plan.png" button_secondary_label="Compare Plans" button_secondary_url="pricing" style="style-1" package_ids="1,2,3,4"][/pricing-plan]'
                    ) .
                    Html::tag(
                        'div',
                        '[compare-plans quantity="6" title_1="Requests Quota" free_1="50k Requests/Day" standard_1="100k Requests/Day" business_1="500k Requests/Day" enterprise_1="Unlimited" title_2="Account Acess" free_2="35" standard_2="85" business_2="120" enterprise_2="Unlimited" title_3="Service Analystic" business_3="true" enterprise_3="true" title_4="Achive Nodes" business_4="true" enterprise_4="true" title_5="Enriched APIs" business_5="true" title_6="Rosetta APIs" business_6="true" enterprise_6="true"][/compare-plans]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services quantity="3" title_1="Daily Updates" description_1="Share updates instantly within our project management software, and get the entire team collaborating" image_1="icons/sync.png" action_1="/contact" label_1="Learn more" title_2="24/7 Support" description_2="Share updates instantly within our project management software, and get the entire team collaborating" image_2="icons/boat-circle.jpg" action_2="/contact" label_2="Learn more" title_3="Weekly Reports" description_3="Share updates instantly within our project management software, and get the entire team collaborating" image_3="icons/report.png" action_3="/contact" label_3="Learn more" style="style-4"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        '[faqs title="Frequently asked questions" subtitle="Feeling inquisitive? Have a read through some of our FAQs or contact our supporters for help" button_primary_label="Contact Us" button_primary_url="contact" button_secondary_label="Support Center" button_secondary_url="contact" image="general/bg-faqs.png" faq_category_ids="1,2,3,4"][/faqs]'
                    ) .
                    Html::tag(
                        'div',
                        '[testimonials title="What our customers are saying" subtitle="Hear from our users who have saved thousands on their Startup and SaaS solution spend." limit="5" style="style-6"][/testimonials]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Teams',
                'content' =>
                    Html::tag(
                        'div',
                        '[banner-hero-with-teams title="Customers Love Our Creative Team, and So Will You" description="“Highly recommend Iori Agency! They guide us on marketing initiatives and develop great strategies to increase our return on investment. The agency is excellent at being cooperative and responding quickly.”" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Support Center" button_secondary_url="/contact" team_ids="1,2,3,4,5" style="style-2"][/banner-hero-with-teams]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="no" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="no" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="no" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="no" style="style-3"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[teams title="Meet the amazing team behind Iori" subtitle="Our leadership team" team_ids="1,2,3,5"][/teams]'
                    ) .
                    Html::tag(
                        'div',
                        '[board-members title="Together we are strong" subtitle="Board members" team_ids="6,7,8,9"][/board-members]'
                    ) .
                    Html::tag(
                        'div',
                        '[have-a-question title="Have a question? Our team is happy to help you" description="Access advanced order types including limit, market, stop limit and dollar cost averaging. Track your total asset holdings, values and equity over time. Monitor markets, manage your portfolio, and trade crypto on the go." image_1="general/question1.png" image_2="general/question2.png" image_3="general/question3.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Learn more" button_secondary_url="/contact"][/have-a-question]'
                    ) .
                    Html::tag(
                        'div',
                        '[step-block title="Core values" subtitle="We break down barriers so teams can focus on what matters – working together to create products their customers love." button_label="JOIN OUR TEAM TODAY" button_url="/contact" quantity="6" title_1="Customers First" description_1="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers" title_2="Act With Integrity" description_2="We’re honest, transparent and committed to doing what’s best for our customers and our company. We openly collaborate in pursuit of the truth. We have no tolerance for politics, hidden agendas or passive-aggressive behavior." title_3="Make a Difference Every Day" description_3="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers." title_4="Think Big" description_4="Being the world’s leading commerce platform requires unrivaled vision, innovation and execution. We never settle. We challenge our ideas of what’s possible in order to better meet the needs of our customers." title_5=" Do the right thing" description_5="Integrity is the foundation for everything we do. We are admired and respected for our commitment to honesty, trust, and transparency." title_6="Stronger united" description_6="We’ve created a positive and inclusive culture that fosters open, honest, and meaningful relationships."][/step-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Term and Conditions',
                'content' =>
                    Html::tag(
                        'div',
                        '[term-and-conditions title="Terms and Conditions" subtitle="Amet nulla facilisi morbi tempus iaculis urna" image="general/banner-term-and-conditions.png" quantity="10" title_1="Limitation of Liability" description_1="Under no circumstances shall Archi Elite be liable for any direct, indirect, special, incidental or consequential damages, including, but not limited to, loss of data or profit, arising out of the use, or the inability to use, the materials on this site, even if Archi Elite or an authorized representative has been advised of the possibility of such damages. If your use of materials from this site results in the need for servicing, repair or correction of equipment or data, you assume any costs thereof." title_2="Licensing Policy" description_2="Archi e WordPress plugins and themes are released under the GNU General Public License v2 or later. Please refer to licensing policy page for licensing details." title_3="Product Compatibility" description_3="The products are developed to be compatible with the latest version of WordPress because we always strive to stay up-to-date with the latest version of WordPress. You might experience certain performance or functionality glitches with the products if you use any version prior to that." title_4="Delivery" description_4="Your purchased product(s) information will be emailed to the email address (that you will provide) once we receive your payment. Even though this usually takes a few minutes, it may also take up to 24 hours. You can contact us through our contact page if you do not receive your email after waiting for this time period. You will also have access to your purchased products from your account in Archi Elite after logging in." title_5="Ownership" description_5="All the products are the property of Archi Elite. So you may not claim ownership (intellectual or exclusive) over any of our products, modified or unmodified. Our products come ‘as is’, without any kind of warranty, either expressed or implied. Under no circumstances can our juridical person be accountable for any damages including, but not limited to, direct, indirect, special, incidental or consequential damages or other losses originating from the employment of or incapacity to use our products." title_6="Browser Compatibility" description_6="We consider it our duty to offer a great experience across most major browsers, which is why our products support the latest modern web browsers including (but not limited to) Firefox, Safari, Chrome & Internet Explorer 9+. However, the performance may vary between different browsers, versions, and operating systems." title_7="Updates" description_7="Our themes are constantly updated to be compatible with the latest stable version of WordPress. Please ensure that you always use the most current version of our themes." title_8="Theme Support" description_8="Please refer to Help and Support Policy page for details." title_9="Price Changes" description_9="Reserves the right to modify or suspend (temporarily or permanently) a subscription at any point of time and from time to time with or without any notice." title_10="Refund Policy" description_10="Please refer to Refund Policy page for details."][/term-and-conditions]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Cookie Policy',
                'content' => Html::tag('h3', 'EU Cookie Consent') .
                    Html::tag(
                        'p',
                        'To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.'
                    ) .
                    Html::tag('h4', 'Essential Data') .
                    Html::tag(
                        'p',
                        'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.'
                    ) .
                    Html::tag(
                        'p',
                        '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.'
                    ) .
                    Html::tag(
                        'p',
                        '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'
                    ),
                'template' => 'page-detail',
                'header_breadcrumb_style' => 'default',
            ],
            [
                'name' => 'Privacy policy',
                'content' => Html::tag('h3', 'EU Privacy policy') .
                    Html::tag(
                        'p',
                        'To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.'
                    ) .
                    Html::tag('h4', 'Essential Data') .
                    Html::tag(
                        'p',
                        'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.'
                    ) .
                    Html::tag(
                        'p',
                        '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.'
                    ) .
                    Html::tag(
                        'p',
                        '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'
                    ),
                'template' => 'page-detail',
                'header_breadcrumb_style' => 'default',
            ],
            [
                'name' => 'Career Listing',
                'content' =>
                    Html::tag(
                        'div',
                        htmlentities('[career-banner title="We’re Always Searching For <br> Amazing People to Join Our Team." subtitle="Take a look at our current openings" image="general/banner-career.png" logo="general/certify.png"][/career-banner]')
                    ) .
                    Html::tag(
                        'div',
                        '[featured-services title="Why You Should Consider Applying" subtitle="We`re lively, not corporate. We have the energy and boldness of a startup and the expertise and pragmatism of a scale-up. All in one place." quantity="4" title_1="Connected" description_1="We come together wherever we are – across time zones, regions, offices and screens. You will receive support from your teammates anytime and anywhere." image_1="icons/free.png" action_1="/contact" title_2="Inclusive" description_2="Our teams reflect the rich diversity of our world, with equitable access to opportunity for everyone. No matter where you come from" image_2="icons/cross-platform.png" action_2="/contact" title_3="Flexible" description_3="We believe in your freedom to work when and how you work best, to help us all thrive. Only freedom and independent work can bring out the best in you." image_3="icons/identity.png" action_3="/contact" title_4="Persuasion" description_4="Knowing that there is real value to be gained from helping people to simplify whatever it is that they do and bring." image_4="icons/persuasion.png" action_4="/contact" style="style-3"][/featured-services]'
                    ) .
                    Html::tag(
                        'div',
                        htmlentities('[career-list title="Career Opportunities" subtitle="Explore our open roles for working totally remotely, from the <br> office or somewhere in between." button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Learn More" button_secondary_url="/job-listing" career_ids="1,2,3,4,5,6"][/career-list]')
                    ) .
                    Html::tag(
                        'div',
                        '[step-block title="Core values" subtitle="We break down barriers so teams can focus on what matters – working together to create products their customers love." button_label="Get Started Now" button_url="/contact" quantity="6" title_1="Customers First" description_1="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers" title_2="Act With Integrity" description_2="We’re honest, transparent and committed to doing what’s best for our customers and our company. We openly collaborate in pursuit of the truth. We have no tolerance for politics, hidden agendas or passive-aggressive behavior." title_3="Make a Difference Every Day" description_3="Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers." title_4="Think Big" description_4="Being the world’s leading commerce platform requires unrivaled vision, innovation and execution. We never settle. We challenge our ideas of what’s possible in order to better meet the needs of our customers." title_5=" Do the right thing" description_5="Integrity is the foundation for everything we do. We are admired and respected for our commitment to honesty, trust, and transparency." title_6="Stronger united" description_6="We’ve created a positive and inclusive culture that fosters open, honest, and meaningful relationships."][/step-block]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Loved By Developers Trusted By Enterprises" subtitle="We helped these brands turn online assessments into success stories." quantity="6" title_1="Cuebia" image_1="product-categories/2.png" url_1="https://www.cuebiq.com/" is_open_new_tab_1="yes" title_2="Factual" image_2="product-categories/3.png" url_2="http://factual.com" is_open_new_tab_2="yes" title_3="Kippa" image_3="product-categories/5.png" url_3="https://kippa.africa/" is_open_new_tab_3="no" title_4="PlaceIQ" image_4="product-categories/8.png" url_4="https://www.placeiq.com/" is_open_new_tab_4="no" image_5="product-categories/10.png" url_5="https://www.reedelsevier.com.ph/" is_open_new_tab_5="no" title_6="Versed" image_6="product-categories/12.png" url_6="https://www.reedelsevier.com.ph/" is_open_new_tab_6="no" style="style-4"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[get-in-touch title="Want to talk to a marketing expert?" subtitle="Get In Touch" description="You need to create an account to find the best and preferred job. lorem Ipsum is simply dummy text of the printing and typesetting industry the standard dummy text ever took." image="general/img-marketing.png" button_primary_label="Contact Us" button_primary_url="/contact" button_secondary_label="Support Center" button_secondary_url="/contact"][/get-in-touch]'
                    ) .
                    Html::tag(
                        'div',
                        '[from-our-blog title="From our blog" subtitle="Aenean velit nisl, aliquam eget diam eu, rhoncus tristique dolor. Aenean vulputate sodales urna ut vestibulum" button_label="View all" button_url="/blog" type="featured" limit="4" style="style-2"][/from-our-blog]'
                    ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Press & Media',
                'content' => file_get_contents(database_path('seeders/contents/press-and-media.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Advertising',
                'content' => file_get_contents(database_path('seeders/contents/ads.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Testimonials',
                'content' => file_get_contents(database_path('seeders/contents/testimonials.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Project management',
                'content' => file_get_contents(database_path('seeders/contents/project-management.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Solutions',
                'content' => file_get_contents(database_path('seeders/contents/solution.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Project Software',
                'content' => file_get_contents(database_path('seeders/contents/project-software.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Resource Software',
                'content' => file_get_contents(database_path('seeders/contents/resource-software.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Workflow Automation',
                'content' => file_get_contents(database_path('seeders/contents/workflow-automation.html')),
                'template' => 'page-detail',
            ],
            [
                'name' => 'Gantt chart makers',
                'content' => file_get_contents(database_path('seeders/contents/gantt-chart-makers.html')),
                'template' => 'page-detail',
            ],
        ];

        $faker = $this->fake();

        foreach ($pages as $item) {
            $item['user_id'] = 1;

            if (! isset($item['template'])) {
                $item['template'] = 'default';
            }

            if (! isset($item['content'])) {
                $item['content'] =
                    Html::tag('p', $faker->realText(500)) . Html::tag('p', $faker->realText(500)) .
                    Html::tag('p', $faker->realText(500)) . Html::tag('p', $faker->realText(500));
            }

            $only = Arr::only($item, ['name', 'content', 'template', 'user_id']);
            $page = Page::query()->create($only);

            SlugHelper::createSlug($page);

            if (Arr::has($item, 'header_breadcrumb_style')) {
                MetaBox::saveMetaBoxData($page, 'header_breadcrumb_style', Arr::get($item, 'header_breadcrumb_style'));
            }
        }
    }
}
