<button id="theme-toggle" type="button"
    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
    <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            d="M3.32031 11.6835C3.32031 16.6541 7.34975 20.6835 12.3203 20.6835C16.1075 20.6835 19.3483 18.3443 20.6768 15.032C19.6402 15.4486 18.5059 15.6834 17.3203 15.6834C12.3497 15.6834 8.32031 11.654 8.32031 6.68342C8.32031 5.50338 8.55165 4.36259 8.96453 3.32996C5.65605 4.66028 3.32031 7.89912 3.32031 11.6835Z">
        </path>
    </svg>
    <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="1.5" />
        <path d="M12 2V3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        <path d="M12 21V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        <path d="M22 12L21 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        <path d="M3 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        <path d="M19.0708 4.92969L18.678 5.32252" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        <path d="M5.32178 18.6777L4.92894 19.0706" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        <path d="M19.0708 19.0703L18.678 18.6775" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        <path d="M5.32178 5.32227L4.92894 4.92943" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
    </svg>
</button>

<script>
// Get the toggle button and icons
const themeToggleBtn = document.getElementById('theme-toggle');
const lightIcon = document.getElementById('theme-toggle-light-icon');
const darkIcon = document.getElementById('theme-toggle-dark-icon');

// On page load or when changing themes, ensure the correct icon is displayed
if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia(
        '(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    darkIcon.classList.remove('hidden');
} else {
    lightIcon.classList.remove('hidden');
}

themeToggleBtn.addEventListener('click', () => {
    // Toggle the dark class on the root element
    document.documentElement.classList.toggle('dark');

    // Toggle which icon is visible
    lightIcon.classList.toggle('hidden');
    darkIcon.classList.toggle('hidden');

    // Save the user's preference in local storage
    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
});
</script>