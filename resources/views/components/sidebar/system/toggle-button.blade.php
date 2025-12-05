<!-- Sidebar Toggle Button (visible on mobile) -->
<button id="sidebarToggleBtn"
    class="fixed left-4 top-4 z-50 lg:hidden rounded-lg bg-slate-900 p-2 text-white hover:bg-slate-800 dark:bg-slate-700 dark:hover:bg-slate-600">
    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggleBtn');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    }

    function openSidebarMobile() {
        if (window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
    }

    // Initialize on load
    document.addEventListener('DOMContentLoaded', function() {
        openSidebarMobile();
    });

    // Toggle button click
    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleSidebar);
    }

    // Close sidebar when clicking overlay
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    // Close sidebar when clicking on a link (mobile only)
    if (sidebar) {
        sidebar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    closeSidebar();
                }
            });
        });
    }

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            // Desktop: ensure sidebar is visible
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.add('hidden');
        } else {
            // Mobile: hide sidebar
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
    });
</script>
