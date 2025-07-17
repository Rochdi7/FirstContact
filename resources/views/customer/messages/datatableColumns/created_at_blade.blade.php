<span class="badge badge-light-dark text-muted">
    {{ $row->created_at ? $row->created_at->diffForHumans() : '-' }}
</span>