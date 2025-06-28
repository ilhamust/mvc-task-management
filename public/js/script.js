document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle (NEW FEATURE)
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const sidebar = document.querySelector('.sidebar');
    
    if (mobileMenuBtn && sidebar) {
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-open');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                    sidebar.classList.remove('mobile-open');
                }
            }
        });
        
        // Close sidebar on window resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('mobile-open');
            }
        });
    }

    // Smooth scrolling for main content (NEW FEATURE)
    const mainContent = document.querySelector('.main-content');
    if (mainContent) {
        // Add smooth scrolling behavior
        mainContent.style.scrollBehavior = 'smooth';
    }

    // Button Click Effects (EXISTING)
    document.querySelectorAll('button, .btn-primary').forEach(button => {
        button.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            // Scale effect
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
                ripple.remove();
            }, 150);
        });
    });

    // Smooth Scrolling for anchor links (EXISTING)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                // For fixed layout, scroll within main content area
                if (mainContent && mainContent.contains(target)) {
                    const targetRect = target.getBoundingClientRect();
                    const mainRect = mainContent.getBoundingClientRect();
                    const scrollTop = mainContent.scrollTop + (targetRect.top - mainRect.top);
                    
                    mainContent.scrollTo({
                        top: scrollTop,
                        behavior: 'smooth'
                    });
                } else {
                    target.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                }
            }
        });
    });

    // Filter Buttons Functionality (EXISTING)
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all filter buttons
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('active');
                b.classList.add('bg-gray-100', 'text-gray-600');
                b.classList.remove('bg-blue-600', 'text-white');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            this.classList.remove('bg-gray-100', 'text-gray-600');
            this.classList.add('bg-blue-600', 'text-white');
            
            // Here you can add filtering logic
            console.log('Filter applied:', this.textContent.trim());
        });
    });

    // View Toggle Functionality (EXISTING)
    document.querySelectorAll('.view-toggle').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-toggle').forEach(b => {
                b.classList.remove('bg-gray-100', 'text-gray-600');
                b.classList.add('text-gray-400');
            });
            
            this.classList.add('bg-gray-100', 'text-gray-600');
            this.classList.remove('text-gray-400');
        });
    });

    // Task Checkbox Functionality (EXISTING)
    document.querySelectorAll('.task-item input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const taskItem = this.closest('.task-item');
            const taskTitle = taskItem.querySelector('h4');
            
            if (this.checked) {
                taskItem.classList.add('opacity-75');
                taskTitle.classList.add('line-through');
                
                // Add completion animation
                taskItem.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    taskItem.style.transform = 'scale(1)';
                }, 200);
                
                console.log('Task completed:', taskTitle.textContent);
            } else {
                taskItem.classList.remove('opacity-75');
                taskTitle.classList.remove('line-through');
                console.log('Task uncompleted:', taskTitle.textContent);
            }
        });
    });

    // Quick Action Buttons (EXISTING + ENHANCED)
    document.querySelectorAll('.quick-action-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.textContent.trim();
            console.log('Quick action:', action);
            
            // You can add specific functionality for each quick action
            if (action.includes('Tambah Tugas')) {
                // Open add task modal or redirect
                console.log('Opening add task dialog...');
                openAddTaskModal();
            } else if (action.includes('Export')) {
                // Trigger export functionality
                console.log('Exporting data...');
                exportData();
            }
        });
    });

    // Search Functionality (EXISTING + ENHANCED for fixed layout)
    const searchInput = document.querySelector('input[placeholder="Cari tugas..."]');
    if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchTerm = this.value.toLowerCase();
                console.log('Searching for:', searchTerm);
                
                // Here you can implement search functionality
                document.querySelectorAll('.task-item').forEach(task => {
                    const title = task.querySelector('h4')?.textContent.toLowerCase() || '';
                    const description = task.querySelector('p')?.textContent.toLowerCase() || '';
                    
                    if (title.includes(searchTerm) || description.includes(searchTerm)) {
                        task.style.display = 'block';
                        task.style.opacity = '1';
                    } else {
                        if (searchTerm) {
                            task.style.display = 'none';
                            task.style.opacity = '0.5';
                        } else {
                            task.style.display = 'block';
                            task.style.opacity = '1';
                        }
                    }
                });
                
                // Add visual feedback for search
                if (searchTerm) {
                    searchInput.classList.add('ring-2', 'ring-blue-500');
                } else {
                    searchInput.classList.remove('ring-2', 'ring-blue-500');
                }
            }, 300);
        });

        // Clear search on Escape key
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                this.value = '';
                this.dispatchEvent(new Event('input'));
                this.blur();
            }
        });
    }

    // Navigation Active State Management (EXISTING)
    function updateActiveNavigation() {
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-item').forEach(link => {
            const href = link.getAttribute('href');
            
            if (href && currentPath.includes(href.split('/').pop())) {
                link.classList.add('active');
            } else if (href === '/eisenhower-app/public/' && currentPath === '/eisenhower-app/public/') {
                link.classList.add('active');
            }
        });
    }

    updateActiveNavigation();

    // Floating Action Button Animation (EXISTING)
    const fab = document.querySelector('.fixed.bottom-8.right-8');
    if (fab) {
        fab.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(90deg)';
        });
        
        fab.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });

        fab.addEventListener('click', function() {
            console.log('Opening add task dialog...');
            openAddTaskModal();
        });
    }

    // Auto-hide notification dots after interaction (EXISTING)
    document.querySelectorAll('.notification-dot').forEach(dot => {
        const parent = dot.closest('button, .relative');
        if (parent) {
            parent.addEventListener('click', function() {
                setTimeout(() => {
                    dot.style.display = 'none';
                }, 1000);
            });
        }
    });

    // Scroll to top functionality for main content (NEW FEATURE)
    function addScrollToTop() {
        if (mainContent) {
            // Create scroll to top button
            const scrollTopBtn = document.createElement('button');
            scrollTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
            scrollTopBtn.className = 'fixed bottom-6 right-6 w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition-all duration-300 opacity-0 pointer-events-none z-50';
            scrollTopBtn.id = 'scroll-to-top';
            document.body.appendChild(scrollTopBtn);

            // Show/hide scroll to top button
            mainContent.addEventListener('scroll', function() {
                if (this.scrollTop > 300) {
                    scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                    scrollTopBtn.classList.add('opacity-100');
                } else {
                    scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
                    scrollTopBtn.classList.remove('opacity-100');
                }
            });

            // Scroll to top functionality
            scrollTopBtn.addEventListener('click', function() {
                mainContent.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    }

    addScrollToTop();

    // Keyboard shortcuts (NEW FEATURE)
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K for search focus
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            if (searchInput) {
                searchInput.focus();
                searchInput.select();
            }
        }
        
        // Ctrl/Cmd + N for new task
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            openAddTaskModal();
        }
        
        // Escape to close mobile menu
        if (e.key === 'Escape' && sidebar && sidebar.classList.contains('mobile-open')) {
            sidebar.classList.remove('mobile-open');
        }
    });
});

// Helper Functions (NEW)
function openAddTaskModal() {
    // Placeholder function for opening add task modal
    // You can implement your modal logic here
    console.log('Add task modal should open here');
    alert('Fungsi Tambah Tugas akan diimplementasikan di sini');
}

function exportData() {
    // Placeholder function for data export
    // You can implement your export logic here
    console.log('Data export should start here');
    alert('Fungsi Export Data akan diimplementasikan di sini');
}

// Add CSS for ripple animation and additional styles (EXISTING + ENHANCED)
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    /* Enhanced transitions for fixed layout */
    .main-content {
        scroll-behavior: smooth;
    }
    
    /* Mobile sidebar overlay */
    @media (max-width: 768px) {
        .sidebar::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: -1;
        }
        
        .sidebar.mobile-open::before {
            opacity: 1;
            visibility: visible;
        }
    }
    
    /* Smooth transitions for task items */
    .task-item {
        transition: all 0.3s ease;
    }
    
    /* Enhanced search input focus */
    input[placeholder*="Cari"]:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    /* Scroll to top button hover effect */
    #scroll-to-top:hover {
        transform: scale(1.1);
    }
`;
document.head.appendChild(style);