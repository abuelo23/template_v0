// Configuración global de jQuery
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

// Bootstrap optimizado (Popper incluido en Bootstrap 5)
import * as bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min.js';
window.bootstrap = bootstrap;

// Popper.js
import * as Popper from '@popperjs/core';
window.Popper = Popper;

// Clipboard.js
import ClipboardJS from 'clipboard';
window.ClipboardJS = ClipboardJS;

// Feather Icons
import feather from 'feather-icons';
window.feather = feather;

// SimpleBar
import SimpleBar from 'simplebar';
window.SimpleBar = SimpleBar;

// FontAwesome SVG Core
import * as FontAwesomeCore from '@fortawesome/fontawesome-svg-core';
window.FontAwesomeCore = FontAwesomeCore;

// SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;
