function viewCourseModule(courseId) {
    alert(`Viewing course modules for: ${courseId}`);
    // Implement PDF viewer logic
}

function buyCoursePDF(courseId) {
    alert(`Buying course modules PDF for: ${courseId}`);
    // Implement purchase logic
}

function toggleView(view) {
    const tables = document.querySelectorAll('.schedule-table');
    const cards = document.querySelectorAll('.schedule-cards');
    tables.forEach(table => table.style.display = view === 'table' ? 'block' : 'none');
    cards.forEach(card => card.style.display = view === 'cards' ? 'block' : 'none');
}

function trackDownload(resourceId) {
    console.log(`Downloading resource ID: ${resourceId}`);
    // Implement download tracking
}

document.addEventListener('DOMContentLoaded', function () {
    // Course search
    const courseSearch = document.getElementById('courseSearch');
    if (courseSearch) {
        courseSearch.addEventListener('input', function () {
            const filter = courseSearch.value.toLowerCase();
            const courseItems = document.querySelectorAll('.course-item');
            courseItems.forEach(item => {
                const name = item.getAttribute('data-name');
                item.style.display = name.includes(filter) ? '' : 'none';
            });
        });
    }

    // Schedule search
    const scheduleSearch = document.getElementById('scheduleSearch');
    if (scheduleSearch) {
        scheduleSearch.addEventListener('input', function () {
            const filter = scheduleSearch.value.toLowerCase();
            const scheduleItems = document.querySelectorAll('.schedule-item');
            scheduleItems.forEach(item => {
                const name = item.getAttribute('data-name');
                item.style.display = name.includes(filter) ? '' : 'none';
            });
        });
    }

    // Resource search
    const resourceSearch = document.getElementById('resourceSearch');
    if (resourceSearch) {
        resourceSearch.addEventListener('input', function () {
            const filter = resourceSearch.value.toLowerCase();
            const resourceItems = document.querySelectorAll('.resource-item');
            resourceItems.forEach(item => {
                const name = item.getAttribute('data-name');
                item.style.display = name.includes(filter) ? '' : 'none';
            });
        });
    }

    // Dashboard search
    const dashboardSearch = document.getElementById('dashboardSearch');
    if (dashboardSearch) {
        dashboardSearch.addEventListener('input', function () {
            const filter = dashboardSearch.value.toLowerCase();
            const courseItems = document.querySelectorAll('.course-item');
            const resourceItems = document.querySelectorAll('.resource-item');
            courseItems.forEach(item => {
                const name = item.getAttribute('data-name');
                item.style.display = name.includes(filter) ? '' : 'none';
            });
            resourceItems.forEach(item => {
                const name = item.getAttribute('data-name');
                item.style.display = name.includes(filter) ? '' : 'none';
            });
        });
    }

    // Announcement read more/less
    const readMoreButtons = document.querySelectorAll('.read-more');
    readMoreButtons.forEach(button => {
        button.addEventListener('click', function () {
            const textElement = this.previousElementSibling;
            const fullText = this.getAttribute('data-full-text');
            if (this.textContent === 'Read More') {
                textElement.textContent = fullText;
                textElement.style.maxHeight = 'none';
                this.textContent = 'Read Less';
            } else {
                textElement.textContent = fullText.substring(0, 100) + '...';
                textElement.style.maxHeight = '4.5rem';
                this.textContent = 'Read More';
            }
        });
    });
});
