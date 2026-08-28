<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Title;
use App\Models\Feature;
use App\Models\Clarifi;
use App\Models\Usability;
use App\Models\Connect;
use App\Models\Faq;
use App\Models\App;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ۱. تیم (۳ تا - اعضای تیم امنیتی / هک)
        $teamMembers = [
            ['name' => 'Mahdiyar', 'position' => 'Lead Security Analyst & Full-Stack Dev'],
            ['name' => 'CyberGhost', 'position' => 'Penetration Tester'],
            ['name' => 'NullByte', 'position' => 'Network Administrator'],
        ];
        
        foreach ($teamMembers as $member) {
            Team::create([
                'name' => $member['name'],
                'position' => $member['position'],
                'image' => null,
            ]);
        }

        // ۲. ریویو (۸ تا - نظرات کاربران درباره سیستم)
        $reviews = [
            'Incredible security architecture and clean code implementation.',
            'The network vulnerability scanner module works like a charm.',
            'Blazing fast performance on Fedora Linux environment.',
            'Love the minimalist UI design and robust backend structure.',
            'Exceptional penetration testing insights and reporting.',
            'Seamless integration between Laravel API and React frontend.',
            'Top-notch security protocols and robust data encryption.',
            'A masterpiece of full-stack development and system administration.',
        ];

        for ($i = 1; $i <= 8; $i++) {
            Review::create([
                'name' => 'Hacker ' . $i,
                'position' => 'Security Researcher',
                'image' => null,
                'message' => $reviews[$i - 1],
            ]);
        }

        // ۳. فیچر (۶ تا - ویژگی‌های امنیتی و فنی)
        $features = [
            ['title' => 'Advanced Penetration Testing', 'desc' => 'Comprehensive security audits and vulnerability assessments.'],
            ['title' => 'Network Reconnaissance', 'desc' => 'Deep packet inspection and advanced Nmap port scanning capabilities.'],
            ['title' => 'OSINT Intelligence', 'desc' => 'Gathering critical open-source intelligence and DNS record analysis.'],
            ['title' => 'Linux System Administration', 'desc' => 'Optimized performance, DNF package management, and robust shell scripting.'],
            ['title' => 'Full-Stack Architecture', 'desc' => 'Scalable backend logic with Laravel and dynamic frontend interfaces.'],
            ['title' => 'Secure Database Management', 'desc' => 'Protected SQL databases with strict access control and encrypted queries.'],
        ];

        foreach ($features as $index => $feature) {
            Feature::create([
                'title' => $feature['title'],
                'description' => $feature['desc'],
                'icon' => 'fa-shield-alt',
            ]);
        }

        // ۴. فک / سوالات متداول (۶ تا - سوالات هک و شبکه)
        $faqs = [
            ['q' => 'How to perform a safe network port scan?', 'answer' => 'You can use Nmap with proper authorization and target flags to inspect open ports.'],
            ['q' => 'What is the role of OSINT in cybersecurity?', 'answer' => 'OSINT helps in gathering publicly available intelligence about targets before testing.'],
            ['q' => 'Why use Linux for development and security?', 'answer' => 'Linux provides total control, powerful terminal utilities, and unmatched stability.'],
            ['q' => 'How are database migrations handled in Laravel?', 'answer' => 'Migrations act as version control for your database schemas safely and efficiently.'],
            ['q' => 'What makes a web application secure against injections?', 'answer' => 'Using Eloquent ORM, prepared statements, and strict input validation.'],
            ['q' => 'How to prevent accidental database wiping during tests?', 'answer' => 'Always configure a separate testing database in your .env.testing configuration.'],
        ];

        foreach ($faqs as $faq) {
            Faq::create([
                'question' => $faq['q'],
                'answer' => $faq['answer'],
            ]);
        }

        // ۵. بقیه مدل‌ها (هر کدوم ۱ دونه)
        Slider::create([
            'title' => 'Next-Gen Cybersecurity & Development',
            'description' => 'Exploring the depths of ethical hacking, networking, and full-stack engineering.',
            'image' => null,
            'link' => '#',
        ]);

        Title::create([
            'features' => 'Core Security Features',
            'reviews' => 'Researcher Testimonials',
            'answers' => 'Frequently Asked Questions',
        ]);

        Clarifi::create([
            'title' => 'System Clarification & Insights',
            'description' => 'Detailed documentation of security protocols, routing, and system architecture.',
            'image' => null,
        ]);

        Usability::create([
            'title' => 'Terminal & Automation Toolkit',
            'description' => 'Powerful script automation and rapid deployment tools for Fedora Linux.',
            'image' => null,
            'youtube' => 'https://youtube.com',
            'link' => '#',
        ]);

        Connect::create([
            'title' => 'Establish Secure Connection',
            'description' => 'Get in touch for security collaborations, code reviews, and tech discussions.',
        ]);

        App::create([
            'title' => 'Devora Security Suite',
            'description' => 'The ultimate companion app for full-stack management and security tracking.',
            'image' => null,
        ]);
    }
}