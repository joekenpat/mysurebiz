<div class={{isset($mainWrapper) ? $mainWrapper : 'col-sm-6'}}>
    <div class="form-group">
        <label class={{isset($extraClass) ? $extraClass : ''}}>Daily Pennywise
            <small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="This is the amount of tokens you keep per day for the total period of your course."></i>
        </label>
        <select name="pennywise" class="form-control" aria-required="true">
            <option disabled selected>Choose...</option>
            <option value="200">Amicable (&#8358;200/day)</option>
            <option value="500">Premium (&#8358;500/day)</option>
            <option value="1000">Gold (&#8358;1000/day)</option>
        </select>
    </div>
</div>