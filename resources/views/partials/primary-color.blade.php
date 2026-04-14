<style>
  :root {
    --primary: #5E7AC4;
    --primary-2: #4E68B1;
    --primary-3: #3F59A0;
    --primary-soft: #D8E1F7;
  }

  /* Navbar active indicator (pill) */
  .nav-link {
    display: inline-flex;
    align-items: center;
    border-radius: 9999px;
    padding: 8px 14px;
    line-height: 1;
    border: 1px solid transparent;
    transition: background-color 160ms ease, color 160ms ease, box-shadow 160ms ease, border-color 160ms ease;
  }
  .nav-link.block { display: flex; width: 100%; }
  .nav-link:hover {
    background: var(--primary-soft);
    color: #111827 !important;
  }
  .nav-link.active {
    background: var(--primary);
    border-color: var(--primary-3);
    color: #FFFFFF !important;
    font-weight: 700;
    box-shadow: 0 8px 16px rgba(17, 24, 39, 0.06);
  }

  /* Tailwind utility overrides (for pages using Tailwind CDN) */
  .text-green-400, .text-emerald-400, .text-green-600, .text-green-700, .text-emerald-600, .text-emerald-700, .text-green-800, .text-emerald-800 { color: #111827 !important; }
  .hover\:text-green-600:hover, .hover\:text-green-400:hover, .hover\:text-emerald-600:hover, .hover\:text-green-700:hover { color: #111827 !important; }

  .bg-green-400, .bg-green-600, .bg-green-700, .bg-green-500, .bg-emerald-400, .bg-emerald-600, .bg-emerald-700, .bg-emerald-500 { background-color: var(--primary) !important; }
  .bg-green-100, .bg-emerald-100 { background-color: var(--primary-soft) !important; }

  .border-green-400, .border-green-500, .border-green-600, .border-green-700, .border-emerald-400, .border-emerald-600, .border-emerald-700 { border-color: var(--primary) !important; }
  .ring-green-500, .ring-green-600, .ring-emerald-600 { --tw-ring-color: var(--primary) !important; }

  .from-green-400, .from-green-500, .from-green-600, .from-green-700,
  .from-emerald-500, .from-emerald-600, .from-emerald-700 {
    --tw-gradient-from: var(--primary) var(--tw-gradient-from-position) !important;
    --tw-gradient-to: rgb(255 195 0 / 0) var(--tw-gradient-to-position) !important;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to) !important;
  }
  .via-emerald-500, .via-emerald-600 {
    --tw-gradient-via: var(--primary-2) var(--tw-gradient-via-position) !important;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-via), var(--tw-gradient-to) !important;
  }
  .to-emerald-600, .to-emerald-700, .to-green-600, .to-green-700, .to-lime-500 {
    --tw-gradient-to: var(--primary-3) var(--tw-gradient-to-position) !important;
  }

  /* Pulse animation in home uses green rgba; align it to primary */
  @keyframes pulse { 0%,100%{box-shadow:0 0 0 0 rgba(94,122,196,0.70)} 50%{box-shadow:0 0 0 15px rgba(94,122,196,0)} }

  /* Footer hover (contrast on dark footer) */
  footer .hover\:text-green-400:hover,
  footer .hover\:text-green-600:hover,
  footer .hover\:text-green-700:hover,
  footer .hover\:text-emerald-600:hover { color: var(--primary) !important; }
</style>


