<?php

namespace Tests\Feature;

use App\Enums\CashReport;
use App\Enums\OrderStatus;
use App\Enums\ReportType;
use App\Enums\UserRole;
use App\Models\order as Order;
use App\Models\Report;
use App\Models\User;
use Tests\TestCase;

class ReportTest extends TestCase
{
    
        // Helper method to create and authenticate a user
        protected function authenticateUser()
        {
            $user = User::factory()->withRole(UserRole::Admin->value)->create();
            $this->actingAs($user);
            return $user;
        }
    
        public function test_authenticated_user_can_access_report_order_page()
        {
            $this->authenticateUser();
    
            $response = $this->get('/admin/orderReport');
    
            $response->assertStatus(200);
            $response->assertViewIs('admin.report.order');
        }

        public function test_authenticated_user_can_access_report_cash_page()
        {
            $this->authenticateUser();
    
            $response = $this->get('/admin/cashReport');
    
            $response->assertStatus(200);
            $response->assertViewIs('admin.report.cash');
        }


        public function test_authenticated_user_can_access_report_bill_page()
        {
            $this->authenticateUser();
    
            $response = $this->get('/admin/billReportView');
    
            $response->assertStatus(200);
            $response->assertViewIs('admin.report.bills');
        }
    
        public function test_unauthenticated_user_cannot_access_report_main_page()
        {
            $response = $this->get('/admin/Report');
    
            $response->assertRedirect('/login');
        }
    
        public function test_authenticated_user_can_generate_cash_report()
        {
            $user = $this->authenticateUser();
    
            // Create some orders with different payment statuses
            Order::factory()->count(5)->create(['user_id' => $user->id, 'payed' => 100]);
            Order::factory()->count(3)->create(['user_id' => $user->id, 'payed' => 50]);
            Order::factory()->count(2)->create(['user_id' => $user->id, 'payed' => 0]);
    
            $data = [
                'reporttype' => ReportType::CASH->value,
                'type' => CashReport::FULLY_PAID->value,
                'from' => now()->subDays(30)->format('Y-m-d'),
                'to' => now()->format('Y-m-d'),
            ];
    
            $response = $this->post('/admin/Report', $data);
    
            $response->assertStatus(200);
            // Assert PDF content type header
            $response->assertHeader('Content-Type', 'application/pdf');
            // ... (Additional assertions for PDF content or file generation)
        }
    
        public function test_authenticated_user_can_view_order_reports_with_filters()
        {
            $user = $this->authenticateUser();
    
            // Create some order reports
            Report::factory()->count(5)->create([
                'reporttype' => ReportType::ORDER->value,
                'type' => OrderStatus::NEW_ORDER->value,
            ]);
            Report::factory()->count(3)->create([
                'reporttype' => ReportType::ORDER->value,
                'type' => OrderStatus::COMPLETED_ORDER->value,
            ]);
    
        
    
            $response = $this->get('/admin/orderReport');
    
            $response->assertStatus(200);
            $response->assertViewIs('admin.report.order');
            $response->assertViewHas('orderReport');
            // ... (Assert that only new order reports are displayed)
        }
    
        // ... (Similar tests for other methods with authentication and specific assertions)
    }
?>