<?php

namespace Database\Seeders;

use App\Models\Edition;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EditionSeeder extends Seeder
{
    protected $model = Edition::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'institute_id' => 1,
                'title' => 'FDI 2024 Edition',
                'acronym' => 'fdi',
                'price' => '99.99',
                'active' => 1,
                'startDate' => '2024-03-11',
                'endDate' => '2024-03-16',
                'about' => 'fdi',
                'overview' => 'The family as the basic unit of society has far reaching implications on individual bent and ultimately on national stability in all respects. Social sciences have lost the primacy of the family as the building block for life',
                'seo' => 'Family Development, Family Institute, Family Growth, Family Therapy, Family Counseling, Family Support,  Family Health Programs',
            ],
            [
                'institute_id' => 2,
                'title' => 'MTI 2024 Edition',
                'acronym' => 'mti',
                'price' => '99.99',
                'active' => 1,
                'startDate' => '2024-04-08',
                'endDate' => '2024-04-13',
                'about' => 'MTI',
                'overview' => 'All behavior follows the dictates of the mind. As a person thinks so is he or she. This institute explores the pillars that govern beliefs systems, conditioning through cultural experiences and critical events. The brain',
                'seo' => 'Mindset Transformation, Self-improvement, Personal Growth, Mental Health, Positive Thinking, Mindfulness',
            ],

            [
                'institute_id' => 3,
                'title' => 'IGPP 2024 Edition',
                'acronym' => 'igpp',
                'price' => '99.99',
                'active' => 1,
                'startDate' => '2024-05-13',
                'endDate' => '2024-05-18',
                'about' => 'Igpp',
                'overview' => 'Are you interested in Government, Governance and Leadership within the private, public and NGO sectors? This institute is designed to develop leaders within these spheres of influence. At the heart of this program is a curriculum',
                'seo' => 'Governance, Public Policy, Political Science, Public Administration, Civic Education, Democracy, Leadership',
            ],

            [
                'institute_id' => 4,
                'title' => 'IEA 2024 Edition',
                'acronym' => 'iea',
                'price' => '99.99',
                'active' => 1,
                'startDate' => '2024-06-10',
                'endDate' => '2024-06-15',
                'about' => 'The Institute of Economic Affairs (IEA) is a prestigious executive education program that offers a one-week intensive certificate training in Economics Affairs. The program is facilitated by an international faculty with expertise in different areas of economics, ensuring a comprehensive learning experience for participants.

                This program is designed to cater to the needs of professionals who are already in leadership roles as well as non-professionals who aspire to become leaders in various spheres of influence in society. It provides an immersive and interdisciplinary experience that helps individuals and organizations to enhance their impact and expand their reach.

                Through this program, participants can sharpen their leadership skills and deepen their understanding of the principles of economics. By doing so, they can increase their effectiveness and make a more sustainable impact on their organizations and communities. The program covers key areas such as micro and macroeconomics, trade and globalization, financial management, and economic policy, among others.

                In addition to the rigorous academic curriculum, the IEA provides a range of opportunities for participants to interact with industry experts and thought leaders. This allows them to gain insights into the latest trends and developments in the field of economics, as well as best practices for driving growth and innovation.

                Overall, the IEA is an excellent opportunity for individuals and organizations seeking to enhance their understanding of economics and its impact on the global economy. The program provides a transformative experience that will enable participants to sharpen their influence, expand their sphere of influence, and deepen their impact, making it more sustainable.',
                'overview' => 'Resource management and allocation towards the thriving of everyone and everything is yet to be explored to its greatest possibility. This institute introduces the concept of theonomy which at best exploits the natural resources',
                'seo' => 'Economic Affairs, Economics, Economic Development, Economic Policy, Macroeconomics, Microeconomics, Business Strategy',
            ],
            [
                'institute_id' => 5,
                'title' => 'COSTrAD 2024 Edition',
                'acronym' => 'costrad',
                'price' => '599.99',
                'active' => 1,
                'startDate' => '2024-07-01',
                'endDate' => '2024-07-28',
                'about' => 'Costrad',
                'overview' => 'Higher Education was primarily developed with theology as the queen of the sciences whereby students first studied theology and thereafter any other discipline. Almost all universities were Christian with the study of',
                'seo' => 'Sustainable Development, Environmental Science, Green Technology, Renewable Energy, Climate Change, Circular Economy, Corporate Sustainability',
            ],

            [
                'institute_id' => 6,
                'title' => 'ETADI 2024 Edition',
                'acronym' => 'etadi',
                'price' => '99.990',
                'active' => 1,
                'startDate' => '2024-08-12',
                'endDate' => '2024-08-17',
                'about' => 'Etadi',
                'overview' => 'Current educational modes are based on the Industrial revolution which has since been outmoded. A new educational paradigm that goes beyond literacy and numeracy is not only necessary but urgent in preparing citizens of a given',
                'seo' => 'Education, Training, Development, Adult Learning, Instructional Design, Curriculum Development, E-learning',
            ],

            [
                'institute_id' => 7,
                'title' => 'FIRST 2024 Edition',
                'acronym' => 'first',
                'price' => '99.99',
                'active' => 1,
                'startDate' => '2024-09-09',
                'endDate' => '2024-10-14',
                'about' => 'First',
                'overview' => 'The Futuristic Institute of Science and Technology is a one-week intensive certificate training on  methodical, interdisciplinary, and comprehensive examination of social, technical, and other environmental trends in science and technology with an eye towards predicting future societal dynamics.',
                'seo' => 'Science, Technology, Innovation, Futuristic, Robotics, Artificial Intelligence, Quantum Computing, Space Exploration',
            ],

            [
                'institute_id' => 8,
                'title' => 'MOCI 2024 Edition',
                'acronym' => 'moci',
                'price' => '99.99',
                'active' => 1,
                'startDate' => '2024-10-07',
                'endDate' => '2024-10-12',
                'about' => 'Moci',
                'overview' => 'There are various medium through which information is disseminated. Together they are known as media of communication. In an information age, it is critical to be abreast with how this sphere of influence works.',
                'seo' => 'Media, Communication, Journalism, Public Relations, Advertising, Digital Marketing, Mass Communication',
            ],

            [
                'institute_id' => 9,
                'title' => 'IOASC 2024 Edition',
                'acronym' => 'ioasc',
                'price' => '99.99',
                'active' => 1,
                'startDate' => '2024-11-11',
                'endDate' => '2024-11-16',
                'about' => 'Ioasc',
                'overview' => 'Arts, Sport and Culture have a massive economic contribution and general appeal that can be creatively employed for greater good.
                The Arts are almost as old as human history and so would be sport. Every culture has both aspects of expression associated with most profound thoughts and existential realities. As such, understanding the artistry range; Strategic contribution of the Arts to development; Responsibility base in art education are critical to our identity.',
                'seo' => 'Arts, Sports, Culture, Creativity, Performance, Music, Dance, Theater, Visual Arts',
            ]

        ];

        foreach ($data as $item) {
            Edition::create($item);
        }
    }
}
