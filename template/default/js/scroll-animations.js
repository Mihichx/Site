// Функция для анимации появления элементов при прокрутке
document.addEventListener('DOMContentLoaded', function() {
    // Создаем IntersectionObserver
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, {
        threshold: 0.1, // Элемент считается видимым, если 10% его площади в viewport
        rootMargin: '0px 0px -50px 0px' // Начинаем анимацию чуть раньше
    });

    // Находим все элементы с классом animate-on-scroll
    const animateElements = document.querySelectorAll('.animate-on-scroll');

    // Добавляем их в наблюдатель
    animateElements.forEach(element => {
        observer.observe(element);
    });
});
