document.addEventListener("DOMContentLoaded", function () {
    const cursor = document.getElementById('cursor');
    let lastX = 0, lastY = 0;

    document.addEventListener('mousemove', (e) => {
        if (!cursor) return;

        const { pageX: x, pageY: y } = e; // Use pageX and pageY

        // Calculate rotation angle
        const deltaX = x - lastX;
        const deltaY = y - lastY;
        const angle = Math.atan2(deltaY, deltaX) * (180 / Math.PI);

        lastX = x;
        lastY = y;

        // Update cursor position & rotation
        cursor.style.left = `${x - 20}px`;
        cursor.style.top = `${y - 20}px`;
        cursor.style.transform = `rotate(${angle}deg)`;
    });
});
