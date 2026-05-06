<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data (optional - comment out if you want to keep existing data)
        Project::truncate();

        $projects = [
            [
                'name' => 'E-Commerce Website Redesign',
                'description' => 'Complete redesign of the company e-commerce platform with modern UI/UX, improved performance, and mobile-first approach. Includes payment gateway integration and inventory management system.',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => '2025-02-15',
                'budget' => 25000.00,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile Banking App Development',
                'description' => 'Develop a secure mobile banking application for iOS and Android with features including account management, fund transfers, bill payments, and biometric authentication.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => '2025-03-20',
                'budget' => 85000.00,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company Portfolio Website',
                'description' => 'Build a responsive portfolio website showcasing company services, team members, client testimonials, and completed projects with contact form integration.',
                'status' => 'completed',
                'priority' => 'medium',
                'due_date' => '2024-12-10',
                'budget' => 5000.00,
                'image' => null,
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(5),
            ],
            [
                'name' => 'Inventory Management System',
                'description' => 'Create a comprehensive inventory tracking system with barcode scanning, real-time stock updates, automated reorder alerts, and detailed reporting dashboard.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => '2025-01-30',
                'budget' => 18000.00,
                'image' => null,
                'created_at' => now()->subDays(15),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer Relationship Management (CRM)',
                'description' => 'Develop a custom CRM solution for managing customer interactions, sales pipeline, lead tracking, email campaigns, and performance analytics.',
                'status' => 'pending',
                'priority' => 'low',
                'due_date' => '2025-04-01',
                'budget' => 35000.00,
                'image' => null,
                'created_at' => now()->subDays(7),
                'updated_at' => now(),
            ],
            [
                'name' => 'Employee Attendance System',
                'description' => 'Build an attendance tracking system with facial recognition, GPS check-in/out, leave management, and automated payroll integration capabilities.',
                'status' => 'completed',
                'priority' => 'high',
                'due_date' => '2024-11-25',
                'budget' => 12000.00,
                'image' => null,
                'created_at' => now()->subDays(45),
                'updated_at' => now()->subDays(10),
            ],
            [
                'name' => 'Social Media Marketing Dashboard',
                'description' => 'Create a unified dashboard for managing multiple social media accounts, scheduling posts, analyzing engagement metrics, and generating performance reports.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => '2025-02-28',
                'budget' => 9500.00,
                'image' => null,
                'created_at' => now()->subDays(10),
                'updated_at' => now(),
            ],
            [
                'name' => 'Online Learning Platform',
                'description' => 'Develop an LMS (Learning Management System) with video streaming, course management, student progress tracking, quiz/exam system, and certificate generation.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => '2025-05-15',
                'budget' => 45000.00,
                'image' => null,
                'created_at' => now()->subDays(3),
                'updated_at' => now(),
            ],
            [
                'name' => 'Restaurant POS System',
                'description' => 'Build a point-of-sale system for restaurant chains featuring table management, kitchen display integration, menu customization, and multi-payment support.',
                'status' => 'completed',
                'priority' => 'medium',
                'due_date' => '2024-12-20',
                'budget' => 22000.00,
                'image' => null,
                'created_at' => now()->subDays(60),
                'updated_at' => now()->subDays(15),
            ],
            [
                'name' => 'Healthcare Patient Portal',
                'description' => 'Create a secure patient portal for healthcare providers enabling appointment scheduling, medical record access, prescription refills, and secure messaging with doctors.',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => '2025-01-15',
                'budget' => 55000.00,
                'image' => null,
                'created_at' => now()->subDays(20),
                'updated_at' => now(),
            ],
        ];

        // Insert all data
        foreach ($projects as $project) {
            Project::create($project);
        }

        $this->command->info('✅ Successfully seeded 10 sample projects!');
    }
}