document.addEventListener('DOMContentLoaded', () => {
    fetch('data.json')
        .then(response => response.json())
        .then(data => {
            // サービスリストの表示
            const serviceList = document.getElementById('service-list');
            data.services.forEach(service => {
                const li = document.createElement('li');
                li.textContent = service;
                serviceList.appendChild(li);
            });

            // ポートフォリオアイテムの表示
            const portfolioItems = document.getElementById('portfolio-items');
            data.portfolio.forEach(item => {
                const div = document.createElement('div');
                div.className = 'portfolio-item';
                div.innerHTML = `
                    <h3>${item.title}</h3>
                    <img src="${item.image}" alt="${item.title}">
                    <p>${item.description}</p>
                `;
                portfolioItems.appendChild(div);
            });
        });
});
