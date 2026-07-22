/* Kelarix theme interactions */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		/* ---- Mobile nav toggle ---- */
		var header = document.querySelector('[data-header]');
		var toggle = document.querySelector('[data-nav-toggle]');
		if (header && toggle) {
			toggle.addEventListener('click', function () {
				var open = header.classList.toggle('is-open');
				toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			});
		}

		/* ---- Accordions (proof + discipline) ---- */
		document.querySelectorAll('[data-accordion]').forEach(function (group) {
			group.querySelectorAll('[data-accordion-trigger]').forEach(function (trigger) {
				trigger.addEventListener('click', function () {
					var item = trigger.closest('[data-accordion-item]');
					var isOpen = item.classList.contains('is-open');
					group.querySelectorAll('[data-accordion-item]').forEach(function (i) {
						i.classList.remove('is-open');
						var t = i.querySelector('[data-accordion-trigger]');
						if (t) { t.setAttribute('aria-expanded', 'false'); }
					});
					if (!isOpen) {
						item.classList.add('is-open');
						trigger.setAttribute('aria-expanded', 'true');
					}
				});
			});
		});

		/* ---- Industries carousel ---- */
		document.querySelectorAll('[data-carousel]').forEach(function (carousel) {
			var track = carousel.querySelector('[data-carousel-track]');
			var prev = carousel.querySelector('[data-carousel-prev]');
			var next = carousel.querySelector('[data-carousel-next]');
			var progress = carousel.querySelector('[data-carousel-progress]');
			if (!track) { return; }
			var step = function () {
				var card = track.firstElementChild;
				return card ? card.offsetWidth + 20 : 340;
			};
			var updateProgress = function () {
				if (!progress) { return; }
				var max = track.scrollWidth - track.clientWidth;
				var visible = track.clientWidth / track.scrollWidth;
				var width = Math.max(0.15, visible) * 100;
				var pos = max > 0 ? (track.scrollLeft / max) * (100 - width) : 0;
				progress.style.width = width + '%';
				progress.style.marginLeft = pos + '%';
			};
			var atEnd = function () { return track.scrollLeft >= (track.scrollWidth - track.clientWidth - 4); };
			var goNext = function () {
				if (atEnd()) { track.scrollTo({ left: 0, behavior: 'smooth' }); }
				else { track.scrollBy({ left: step(), behavior: 'smooth' }); }
			};
			var goPrev = function () { track.scrollBy({ left: -step(), behavior: 'smooth' }); };
			if (next) { next.addEventListener('click', goNext); }
			if (prev) { prev.addEventListener('click', goPrev); }
			track.addEventListener('scroll', updateProgress, { passive: true });
			window.addEventListener('resize', updateProgress);
			updateProgress();

			/* Autoplay (pauses on hover / interaction) */
			var timer = null;
			var play = function () { stop(); timer = setInterval(goNext, 4500); };
			var stop = function () { if (timer) { clearInterval(timer); timer = null; } };
			carousel.addEventListener('mouseenter', stop);
			carousel.addEventListener('mouseleave', play);
			track.addEventListener('touchstart', stop, { passive: true });
			play();
		});

		/* ---- Request Diagnostic modal ---- */
		var modal = document.getElementById('requestModal');
		if (modal) {
			var thanksEl = modal.querySelector('.request-modal__thanks');
			var bodyEl = modal.querySelector('.request-modal__body');
			var formHost = bodyEl ? bodyEl.querySelector('.wpcf7') : null;
			var openerSelectors = [
				'[data-modal-open="request"]',
				'.mobile-floating-cta',
				'a[href="#contact"]',
				'a[href$="#contact"]'
			].join(',');

			var setOpen = function (isOpen) {
				if (isOpen) {
					modal.classList.add('is-open');
					modal.setAttribute('aria-hidden', 'false');
					document.documentElement.style.overflow = 'hidden';
				} else {
					modal.classList.remove('is-open');
					modal.setAttribute('aria-hidden', 'true');
					document.documentElement.style.overflow = '';
				}
			};

			document.addEventListener('click', function (e) {
				var opener = e.target.closest(openerSelectors);
				if (opener && !opener.closest('#requestModal')) {
					e.preventDefault();
					if (thanksEl) { thanksEl.hidden = true; }
					if (formHost) { formHost.hidden = false; }
					setOpen(true);
					return;
				}
				if (e.target.closest('[data-modal-close]')) {
					e.preventDefault();
					setOpen(false);
				}
			});

			document.addEventListener('keydown', function (e) {
				if (e.key === 'Escape' && modal.classList.contains('is-open')) {
					setOpen(false);
				}
			});

			/* CF7 success — swap form for thank-you card */
			document.addEventListener('wpcf7mailsent', function (event) {
				var fh = modal.querySelector('.wpcf7');
				if (fh) { fh.hidden = true; }
				if (thanksEl) { thanksEl.hidden = false; }
			}, false);
		}
	});
})();
