import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import.meta.glob([
    '../logo/**',
  ]);

window.Alpine = Alpine
Alpine.plugin(collapse)

Alpine.start()