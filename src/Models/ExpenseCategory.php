<?php

namespace Byte5\LaravelHarvest\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $fillable = [
        'external_id', 'name', 'unit_name', 'unit_price', 'is_active',
    ];

    /**
     * ExpenseCategory constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(
            config('harvest.table_prefix').config('harvest.table_names.expense_categories')
        );
    }

    /**
     * Get category's expenses.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
