<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'g59_budgets'; // Ensure this matches your table name

    // Update the fillable property to match the column names
    protected $fillable = ['budget_name', 'budget_amount'];
}
