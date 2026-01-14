/**
 * Athena Edu - JavaScript Principal
 */

// Theme Manager
const AthenaTheme = {
  init() {
    const saved = localStorage.getItem('athena-theme') || 'light';
    this.set(saved);
    this.bindToggle();
  },
  
  set(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('athena-theme', theme);
    
    const icon = document.getElementById('theme-icon');
    if (icon) {
      icon.innerHTML = theme === 'dark' 
        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>'
        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>';
    }
  },
  
  toggle() {
    const current = document.documentElement.getAttribute('data-theme');
    this.set(current === 'dark' ? 'light' : 'dark');
  },
  
  bindToggle() {
    const btn = document.getElementById('theme-toggle');
    if (btn) {
      btn.addEventListener('click', () => this.toggle());
    }
  }
};

// Sidebar Manager
const AthenaSidebar = {
  init() {
    this.sidebar = document.querySelector('.athena-sidebar');
    this.bindToggle();
    this.bindClickOutside();
  },
  
  toggle() {
    if (this.sidebar) {
      this.sidebar.classList.toggle('open');
    }
  },
  
  close() {
    if (this.sidebar) {
      this.sidebar.classList.remove('open');
    }
  },
  
  bindToggle() {
    const btn = document.getElementById('sidebar-toggle');
    if (btn) {
      btn.addEventListener('click', () => this.toggle());
    }
  },
  
  bindClickOutside() {
    document.addEventListener('click', (e) => {
      if (window.innerWidth <= 768) {
        if (!e.target.closest('.athena-sidebar') && !e.target.closest('#sidebar-toggle')) {
          this.close();
        }
      }
    });
  }
};

// Charts Manager (usando Chart.js)
const AthenaCharts = {
  colors: {
    primary: '#6366f1',
    secondary: '#8b5cf6',
    success: '#10b981',
    warning: '#f59e0b',
    danger: '#ef4444',
    info: '#3b82f6',
    gray: '#64748b'
  },
  
  init() {
    this.initEnrollmentChart();
    this.initAttendanceChart();
    this.initPerformanceChart();
  },
  
  getThemeColors() {
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    return {
      text: isDark ? '#f1f5f9' : '#1e293b',
      grid: isDark ? '#334155' : '#e2e8f0',
      bg: isDark ? '#1e293b' : '#ffffff'
    };
  },
  
  initEnrollmentChart() {
    const ctx = document.getElementById('enrollmentChart');
    if (!ctx) return;
    
    const theme = this.getThemeColors();
    
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
          label: 'Matrículas',
          data: [1200, 1350, 1400, 1380, 1420, 1500, 1480, 1550, 1600, 1580, 1620, 1650],
          borderColor: this.colors.primary,
          backgroundColor: 'rgba(99, 102, 241, 0.1)',
          fill: true,
          tension: 0.4,
          pointRadius: 4,
          pointHoverRadius: 6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: false,
            grid: { color: theme.grid },
            ticks: { color: theme.text }
          },
          x: {
            grid: { display: false },
            ticks: { color: theme.text }
          }
        }
      }
    });
  },
  
  initAttendanceChart() {
    const ctx = document.getElementById('attendanceChart');
    if (!ctx) return;
    
    const theme = this.getThemeColors();
    
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'],
        datasets: [{
          label: 'Presença %',
          data: [92, 88, 95, 91, 87],
          backgroundColor: [
            this.colors.success,
            this.colors.warning,
            this.colors.success,
            this.colors.success,
            this.colors.warning
          ],
          borderRadius: 8
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 100,
            grid: { color: theme.grid },
            ticks: { 
              color: theme.text,
              callback: (value) => value + '%'
            }
          },
          x: {
            grid: { display: false },
            ticks: { color: theme.text }
          }
        }
      }
    });
  },
  
  initPerformanceChart() {
    const ctx = document.getElementById('performanceChart');
    if (!ctx) return;
    
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Aprovados', 'Em Recuperação', 'Reprovados'],
        datasets: [{
          data: [75, 18, 7],
          backgroundColor: [
            this.colors.success,
            this.colors.warning,
            this.colors.danger
          ],
          borderWidth: 0,
          cutout: '70%'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              padding: 20,
              usePointStyle: true,
              color: this.getThemeColors().text
            }
          }
        }
      }
    });
  }
};

// Notifications
const AthenaNotifications = {
  container: null,
  
  init() {
    this.createContainer();
  },
  
  createContainer() {
    if (!document.getElementById('athena-notifications')) {
      const div = document.createElement('div');
      div.id = 'athena-notifications';
      div.style.cssText = 'position:fixed;top:1rem;right:1rem;z-index:9999;display:flex;flex-direction:column;gap:0.5rem;';
      document.body.appendChild(div);
      this.container = div;
    }
  },
  
  show(message, type = 'info', duration = 5000) {
    const colors = {
      success: '#10b981',
      warning: '#f59e0b',
      danger: '#ef4444',
      info: '#3b82f6'
    };
    
    const notification = document.createElement('div');
    notification.style.cssText = `
      padding: 1rem 1.5rem;
      background: white;
      border-radius: 0.5rem;
      box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
      border-left: 4px solid ${colors[type]};
      animation: slideIn 0.3s ease;
      max-width: 350px;
    `;
    notification.textContent = message;
    
    this.container.appendChild(notification);
    
    setTimeout(() => {
      notification.style.animation = 'slideOut 0.3s ease forwards';
      setTimeout(() => notification.remove(), 300);
    }, duration);
  }
};

// Data Fetcher
const AthenaData = {
  async fetch(endpoint) {
    try {
      const response = await fetch(`/api/${endpoint}`, {
        headers: {
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
        }
      });
      return await response.json();
    } catch (error) {
      console.error('Athena fetch error:', error);
      return null;
    }
  },
  
  async getDashboardStats() {
    return await this.fetch('dashboard/stats');
  },
  
  async getAlerts() {
    return await this.fetch('dashboard/alerts');
  }
};

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  AthenaTheme.init();
  AthenaSidebar.init();
  AthenaNotifications.init();
  
  // Init charts only if Chart.js is loaded
  if (typeof Chart !== 'undefined') {
    AthenaCharts.init();
  }
  
  // Add animation classes
  document.querySelectorAll('.athena-stat-card, .athena-card').forEach((el, i) => {
    el.style.animationDelay = `${i * 0.1}s`;
    el.classList.add('athena-animate');
  });
});

// CSS Animations
const style = document.createElement('style');
style.textContent = `
  @keyframes slideIn {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
  }
  @keyframes slideOut {
    from { transform: translateX(0); opacity: 1; }
    to { transform: translateX(100%); opacity: 0; }
  }
`;
document.head.appendChild(style);
