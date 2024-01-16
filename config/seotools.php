<?php
/**
 * @see https://github.com/artesaos/seotools
 */

 return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => config('app.name', 'College of Sustainable Transformation & Development'), // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'

            'description'  => 'Discover the transformative vision of the College of Sustainable Transformation and Development (COSTrAD) - an initiative of the Logos-Rhema Foundation for Leadership Resource Development in Ghana. Our mission is to raise generations of visionary leaders equipped to drive systemic and sustainable change across society. Join us on a journey of global sustainable transformation leadership training.', // set false to total remove

            'separator'    => ' - ',
            'keywords'     => ['College of Sustainable Transformation, COSTrAD, Logos-Rhema Foundation, Leadership Resource Development, Ghana, Visionary leaders, Systemic change, Sustainable development, Global transformation, Leadership training, Governance, Economy, Education, Innovation, Environmental sustainability, Strategic leaders, Education institute, Training and development, Transformational change, Social foundations, Good governance, Economic stability, Skills development, Technology innovation, Family Development Institute, Mindset Transformation Institute, Institute of Governance & Public Policy, Institute of Economic Affairs, Education, Training & Development Institute, Futuristic Institute of Revolutionary Science & Technology, Media of Communication Institute, Institute of Arts, Sports, and Cultural Development, Sustainable Transformation and Development, Sustainable change, Strategic resources, Restorative leadership, Systemic solutions, Leadership empowerment, Global impact, Transformative education, Social transformation, Visionary leadership, Capacity building, Educational platforms, Leadership empowerment, Resource development, Transformational capacity, Qualitative resources, Quantitative resources, Societal development'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots' => 'all',
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => config('app.name', 'College of Sustainable Transformation & Development'), // set false to total remove
            'description'  => 'Discover the transformative vision of the College of Sustainable Transformation and Development (COSTrAD) - an initiative of the Logos-Rhema Foundation for Leadership Resource Development in Ghana. Our mission is to raise generations of visionary leaders equipped to drive systemic and sustainable change across society. Join us on a journey of global sustainable transformation leadership training.',
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@MyCOSTrAD',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => config('app.name', 'College of Sustainable Transformation & Development'), // set false to total remove
            'description'  => 'Discover the transformative vision of the College of Sustainable Transformation and Development (COSTrAD) - an initiative of the Logos-Rhema Foundation for Leadership Resource Development in Ghana. Our mission is to raise generations of visionary leaders equipped to drive systemic and sustainable change across society. Join us on a journey of global sustainable transformation leadership training.',
            'url'         => 'full', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];


