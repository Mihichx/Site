// Переменная для отслеживания текущей страницы карусели (начинаем с первой)
let currentPage = 1;

// Функция определяет сколько карточек новостей видно одновременно в зависимости от ширины экрана
function getVisibleCards() {
    // Получаем текущую ширину окна браузера
    const width = window.innerWidth;
    // Если экран больше 1344px - показываем 4 карточки
    if (width > 1344) return 4;
    // Если экран от 1040 до 1344px - показываем 3 карточки
    if (width > 1040) return 3;
    // Если экран от 740 до 1040px - показываем 2 карточки
    if (width > 740) return 2;
    // Если экран меньше 740px - показываем 1 карточку
    return 1;
}

// Функция обновляет текст счетчика страниц
function updateCounter() {
    // Общее количество новостей (у нас их 6)
    const totalNews = 6;
    // Узнаем сколько карточек видно на текущем экране
    const visibleCards = getVisibleCards();
    // Вычисляем общее количество страниц (округляем вверх)
    // Например: 6 новостей / 4 видимые = 1.5 → округляем до 2 страниц
    const totalPages = Math.ceil(totalNews / visibleCards);
    // Обновляем текст в элементе с id="newsCounter"
    document.getElementById('newsCounter').textContent = `${currentPage} / ${totalPages}`;
}

// Основная функция прокрутки карусели (вызывается при нажатии на кнопки)
function scrollNews(direction) {
    // Находим контейнер с новостями
    const track = document.querySelector('.news-track');
    // Ширина одной карточки новости + отступ (300px)
    const cardWidth = 300;
    // Узнаем сколько карточек видно на экране
    const visibleCards = getVisibleCards();
    // Вычисляем общее количество страниц
    const totalPages = Math.ceil(6 / visibleCards);
    
    // Изменяем номер текущей страницы (direction: -1 = назад, +1 = вперед)
    currentPage += direction;
    
    // Если вышли за последнюю страницу - возвращаемся к первой (циклическая прокрутка)
    if (currentPage > totalPages) {
        currentPage = 1;
    // Если ушли до первой страницы - переходим к последней
    } else if (currentPage < 1) {
        currentPage = totalPages;
    }
    
    // Вычисляем на сколько пикселей нужно прокрутить
    // (номер страницы - 1) * количество видимых карточек * ширина карточки
    const scrollPosition = (currentPage - 1) * visibleCards * cardWidth;
    // Плавно прокручиваем к нужной позиции
    track.scrollTo({
        left: scrollPosition,        // позиция прокрутки
        behavior: 'smooth'          // плавная анимация
    });
    
    // Обновляем счетчик после прокрутки
    updateCounter();
}

// Обновляем счетчик при изменении размера окна (адаптивность)
window.addEventListener('resize', updateCounter);
// Обновляем счетчик при загрузке страницы
window.addEventListener('load', updateCounter);