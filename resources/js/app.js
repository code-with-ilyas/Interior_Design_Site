import './bootstrap';

import Alpine from 'alpinejs';

// Import TomSelect
import TomSelect from 'tom-select';
window.TomSelect = TomSelect;

// Import scroll-top fix
import '../js/fixes/scroll-top-fix.js';

window.Alpine = Alpine;

// Function to initialize TomSelect on elements
function initializeTomSelect() {
    document.querySelectorAll('.tomselect').forEach(function(select) {
        // Check if already initialized
        if (!select.tomselect) {
            new TomSelect(select, {
                plugins: ['remove_button'],
                maxItems: select.hasAttribute('multiple') ? null : 1,
                hideSelected: false,
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        }
    });
}

// Initialize TomSelect when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeTomSelect();
});

// Also initialize TomSelect when Livewire updates or other dynamic content is added
if (window.Livewire) {
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            initializeTomSelect();
        });
    });
}

// For general dynamic content, we can also use a MutationObserver
const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.type === 'childList') {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1 && node.querySelectorAll) { // Element node
                    if (node.classList && node.classList.contains('tomselect') || node.querySelectorAll('.tomselect').length > 0) {
                        initializeTomSelect();
                    }
                }
            });
        }
    });
});

observer.observe(document.body, {
    childList: true,
    subtree: true
});

Alpine.start();
