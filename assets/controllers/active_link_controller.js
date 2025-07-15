import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["link"];

    connect() {
        const currentRoute = this.element.dataset.activeLinkCurrentRoute;

        this.linkTargets.forEach((link) => {

            const isActive = link.dataset.route === currentRoute;

            if (isActive) {
                link.classList.add('text-blue-700');
            } else {
                link.classList.add('text-gray-900', 'dark:text-gray-300');
            }
        });
    }
}
