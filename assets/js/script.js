/**
 * @package       daan/license-enc-key-gen
 * @author        Daan van den Bergh
 * @company       Daan.dev
 * @copyright (c) 2025 Daan van den Bergh
 * @license       MIT
 */

document.addEventListener('DOMContentLoaded', () => {
    const enc_key_gen = {
        link: document.querySelector('.daan-dev-license-enc-key-gen'),

        init: function () {
            this.link.addEventListener('click', this.show_popup);
            document.body.addEventListener('keydown', this.close_popup);
            document.body.addEventListener('backbutton', this.close_popup);
        },

        show_popup: function (e) {
            e.preventDefault();

            let popup = document.querySelector('.daan-dev-license-enc-key-gen-popup');

            if (popup.style.display === 'none') {
                popup.style.display = 'block';
            }
        },

        close_popup: function (e) {
            if (e.key !== 'Escape') {
                return;
            }

            let popup = document.querySelector('.daan-dev-license-enc-key-gen-popup');

            if (popup.style.display === 'block') {
                popup.style.display = 'none';
            }
        }
    };

    enc_key_gen.init();
});