  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('button').forEach(button => {
      button.addEventListener('click', function() {
        this.style.transform = 'scale(0.95)';
        setTimeout(() => this.style.transform = 'scale(1)', 150);
      });
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  });