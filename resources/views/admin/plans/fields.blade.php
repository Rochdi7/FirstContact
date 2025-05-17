<div class="mb-4">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" 
           value="{{ old('name', $plan->name ?? '') }}" required>
</div>

<div class="mb-4">
    <label class="form-label">Max Templates</label>
    <input type="number" name="max_templates" class="form-control" 
           value="{{ old('max_templates', $plan->max_templates ?? '') }}" required>
</div>

<div class="mb-4">
    <label class="form-label">AI Enabled</label>
    <select name="ai_enabled" class="form-control" required>
        <option value="1" {{ old('ai_enabled', $plan->ai_enabled ?? '') == 1 ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ old('ai_enabled', $plan->ai_enabled ?? '') == 0 ? 'selected' : '' }}>No</option>
    </select>
</div>

<div class="mb-4">
    <label class="form-label">Price</label>
    <input type="number" step="0.01" name="price" class="form-control" 
           value="{{ old('price', $plan->price ?? '') }}" required>
</div>

<div class="mb-4">
    <label class="form-label">Features</label>
    <input type="text" name="features" class="form-control" 
           value="{{ old('features', isset($plan) ? implode(',', $plan->features) : '') }}">
</div>
