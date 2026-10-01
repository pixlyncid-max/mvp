/**
 * MVP Law Firm — Framer Motion Animations
 * Uses the vanilla-JS animate, inView, scroll, stagger APIs from the `motion` package
 * (standalone, no React required)
 */
import {
    animate,
    inView,
    stagger,
} from 'motion';

// ─── Utility ──────────────────────────────────────────────────────────────────
const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// ─── 1. HERO WORD ANIMATION ───────────────────────────────────────────────────
// Animate each .w-anim span with a spring-based entrance
function initWordAnimation() {
    if (reduced) return;

    const words = document.querySelectorAll('.w-anim');
    if (!words.length) return;

    words.forEach((word, i) => {
        // Reset opacity so framer-motion takes over
        word.style.opacity  = '0';
        word.style.filter   = 'blur(8px)';
        word.style.transform = 'translateY(20px)';

        const delay = parseFloat(word.style.animationDelay) || i * 80;
        animate(
            word,
            { opacity: [0, 1], filter: ['blur(8px)', 'blur(0px)'], y: [20, 0] },
            {
                duration: 0.75,
                delay: delay / 1000,
                ease: [0.22, 1, 0.36, 1],
            }
        );
    });
}

// ─── 2. SCROLL REVEAL ─────────────────────────────────────────────────────────
// Replace the old IntersectionObserver with framer-motion inView
function initScrollReveal() {
    const elements = document.querySelectorAll('.reveal');
    if (!elements.length) return;

    if (reduced) {
        elements.forEach(el => {
            el.style.opacity   = '1';
            el.style.transform = 'none';
        });
        return;
    }

    elements.forEach((el, i) => {
        // Start state
        el.style.opacity   = '0';
        el.style.transform = 'translateY(32px)';

        inView(
            el,
            (info) => {
                animate(
                    el,
                    { opacity: [0, 1], y: [32, 0] },
                    {
                        duration: 0.75,
                        ease: [0.22, 1, 0.36, 1],
                        // Slight stagger for siblings
                        delay: 0.05,
                    }
                );
            },
            { amount: 0.15 }
        );
    });
}

// ─── 3. STAGGERED GRID ITEMS ──────────────────────────────────────────────────
// Cards inside grids or the carousel get a cascading entrance
function initStaggeredCards() {
    if (reduced) return;

    // Practice-area cards / team cards
    const grids = document.querySelectorAll(
        '[class*="grid"] article.reveal, [class*="grid"] div.reveal, #carousel > div'
    );

    if (!grids.length) return;

    // Group by parent
    const groups = new Map();
    grids.forEach(el => {
        const parent = el.parentElement;
        if (!groups.has(parent)) groups.set(parent, []);
        groups.get(parent).push(el);
    });

    groups.forEach((children) => {
        children.forEach(el => {
            el.style.opacity   = '0';
            el.style.transform = 'translateY(40px)';
        });

        inView(
            children[0],
            () => {
                animate(
                    children,
                    { opacity: [0, 1], y: [40, 0] },
                    {
                        duration: 0.6,
                        delay: stagger(0.1, { startDelay: 0.05 }),
                        ease: [0.22, 1, 0.36, 1],
                    }
                );
            },
            { amount: 0.1 }
        );
    });
}

// ─── 4. PARALLAX BACKGROUND BLOBS ────────────────────────────────────────────
function initParallax() {
    if (reduced) return;

    const blobs = document.querySelectorAll('.parallax');
    if (!blobs.length) return;

    scroll(
        (progress) => {
            blobs.forEach(blob => {
                const rect = blob.getBoundingClientRect();
                const offset = (rect.top + rect.height / 2 - window.innerHeight / 2) * 0.08;
                animate(blob, { y: offset }, { duration: 0, ease: 'linear' });
            });
        }
    );
}

// ─── 5. STICKY HEADER: TRANSPARENT → FROSTED GLASS ON SCROLL ────────────────
function initHeaderScroll() {
    const header = document.getElementById('site-header');
    if (!header) return;

    let lastY = 0;
    const THRESHOLD = 40; // px before glass kicks in

    function updateHeader() {
        const current = window.scrollY;

        // ── Transparent ↔ Frosted glass ──────────────────────────────────────
        if (current > THRESHOLD) {
            header.style.backgroundColor = 'rgba(253,251,252,0.82)';
            header.style.backdropFilter  = 'blur(20px)';
            header.style.webkitBackdropFilter = 'blur(20px)';
            header.style.borderBottom    = '1px solid rgba(36,40,68,0.06)';
            header.style.boxShadow       = '0 4px 24px -4px rgba(36,40,68,0.08)';
        } else {
            header.style.backgroundColor = 'transparent';
            header.style.backdropFilter  = 'none';
            header.style.webkitBackdropFilter = 'none';
            header.style.borderBottom    = '1px solid transparent';
            header.style.boxShadow       = 'none';
        }

        // ── Hide on scroll down / Show on scroll up (only after threshold) ──
        if (!reduced) {
            if (current > 120 && current > lastY + 12) {
                animate(header, { y: -header.offsetHeight }, { duration: 0.3, ease: [0.22, 1, 0.36, 1] });
            } else if (current < lastY - 6 || current < THRESHOLD) {
                animate(header, { y: 0 }, { duration: 0.4, ease: [0.22, 1, 0.36, 1] });
            }
        }

        lastY = current;
    }

    // Run once on load (page may be mid-scroll on back/forward nav)
    updateHeader();

    window.addEventListener('scroll', updateHeader, { passive: true });
}

// ─── 6. BUTTON / CARD HOVER MICRO-ANIMATIONS ─────────────────────────────────
function initHoverAnimations() {
    if (reduced) return;

    // Service / team cards
    document.querySelectorAll('article.grad-border, div.grad-border').forEach(card => {
        card.addEventListener('mouseenter', () => {
            animate(card, { y: -4, scale: 1.01 }, { duration: 0.35, ease: [0.22, 1, 0.36, 1] });
        });
        card.addEventListener('mouseleave', () => {
            animate(card, { y: 0, scale: 1 }, { duration: 0.4, ease: [0.22, 1, 0.36, 1] });
        });
    });

    // CTA buttons (.btn-lift handled by CSS, but FM adds spring feel)
    document.querySelectorAll('button.btn-lift, a.btn-lift').forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            animate(btn, { y: -3, scale: 1.03 }, { duration: 0.3, ease: [0.22, 1, 0.36, 1] });
        });
        btn.addEventListener('mouseleave', () => {
            animate(btn, { y: 0, scale: 1 }, { duration: 0.35, ease: [0.22, 1, 0.36, 1] });
        });
        btn.addEventListener('mousedown', () => {
            animate(btn, { scale: 0.96 }, { duration: 0.1 });
        });
        btn.addEventListener('mouseup', () => {
            animate(btn, { scale: 1.03 }, { duration: 0.15, ease: [0.22, 1, 0.36, 1] });
        });
    });
}

// ─── 7. COUNTER ANIMATION (Stats section) ────────────────────────────────────
function initCounters() {
    const counters = document.querySelectorAll('[data-count]');
    if (!counters.length || reduced) return;

    counters.forEach(el => {
        const target = parseFloat(el.dataset.count);
        const suffix = el.dataset.suffix || '';

        inView(
            el,
            () => {
                animate(0, target, {
                    duration: 1.8,
                    ease: [0.22, 1, 0.36, 1],
                    onUpdate: (v) => {
                        el.textContent = (Number.isInteger(target)
                            ? Math.round(v)
                            : v.toFixed(0)) + suffix;
                    }
                });
            },
            { amount: 0.5 }
        );
    });
}

// ─── 8. HERO SECTION ENTRANCE ────────────────────────────────────────────────
function initHeroEntrance() {
    if (reduced) return;

    // Animate the hero mockup card in
    const mockup = document.querySelector('.hero-mockup');
    if (mockup) {
        animate(
            mockup,
            { opacity: [0, 1], y: [60, 0], scale: [0.96, 1] },
            { duration: 1, delay: 0.6, ease: [0.22, 1, 0.36, 1] }
        );
    }

    // Animate hero eyebrow label
    const eyebrow = document.querySelector('.hero-eyebrow');
    if (eyebrow) {
        animate(
            eyebrow,
            { opacity: [0, 1], y: [20, 0] },
            { duration: 0.6, delay: 0.1, ease: [0.22, 1, 0.36, 1] }
        );
    }

    // Animate hero CTA buttons
    const ctaBtns = document.querySelectorAll('.hero-cta');
    if (ctaBtns.length) {
        animate(
            ctaBtns,
            { opacity: [0, 1], y: [20, 0] },
            {
                duration: 0.6,
                delay: stagger(0.12, { startDelay: 0.7 }),
                ease: [0.22, 1, 0.36, 1],
            }
        );
    }
}

// ─── 9. FAQ / ACCORDION ANIMATION UPGRADE ────────────────────────────────────
// Replace max-height toggle with smooth Framer Motion height animation
function initAccordionAnimations() {
    document.querySelectorAll('.faq-btn').forEach(btn => {
        // Remove old event listeners by cloning (original ones in layout still fire)
        // We piggyback by watching aria-expanded changes
        const observer = new MutationObserver(() => {
            const isOpen = btn.getAttribute('aria-expanded') === 'true';
            const body   = btn.nextElementSibling;
            const icon   = btn.querySelector('.faq-icon');

            if (!body) return;

            if (isOpen) {
                body.style.maxHeight = body.scrollHeight + 'px';
                if (!reduced && icon) {
                    animate(icon, { rotate: 180 }, { duration: 0.35, ease: [0.22, 1, 0.36, 1] });
                }
            } else {
                body.style.maxHeight = '0';
                if (!reduced && icon) {
                    animate(icon, { rotate: 0 }, { duration: 0.3, ease: [0.22, 1, 0.36, 1] });
                }
            }
        });

        observer.observe(btn, { attributes: true, attributeFilter: ['aria-expanded'] });
    });
}

// ─── 10. SCROLL PROGRESS BAR ─────────────────────────────────────────────────
function initScrollProgressBar() {
    if (reduced) return;

    const bar = document.createElement('div');
    bar.id = 'scroll-progress';
    bar.style.cssText = [
        'position: fixed',
        'top: 0',
        'left: 0',
        'width: 0%',
        'height: 3px',
        'background: linear-gradient(90deg, #B89A72, #242844)',
        'z-index: 9999',
        'pointer-events: none',
        'transform-origin: left',
    ].join(';');
    document.body.prepend(bar);

    window.addEventListener('scroll', () => {
        const total = document.body.scrollHeight - window.innerHeight;
        const pct   = total > 0 ? (window.scrollY / total) * 100 : 0;
        animate(bar, { width: `${pct}%` }, { duration: 0, ease: 'linear' });
    }, { passive: true });
}

// ─── 11. TIMELINE ITEMS ───────────────────────────────────────────────────────
function initTimeline() {
    if (reduced) return;

    const items = document.querySelectorAll('.timeline-item');
    if (!items.length) return;

    items.forEach((item, i) => {
        item.style.opacity   = '0';
        item.style.transform = i % 2 === 0 ? 'translateX(-30px)' : 'translateX(30px)';

        inView(
            item,
            () => {
                animate(
                    item,
                    { opacity: [0, 1], x: [i % 2 === 0 ? -30 : 30, 0] },
                    { duration: 0.7, delay: 0.05, ease: [0.22, 1, 0.36, 1] }
                );
            },
            { amount: 0.3 }
        );
    });
}

// ─── 12. TEAM CATEGORY FILTER WITH FRAMER MOTION ────────────────────────────
function initTeamCategoryFilter() {
    const navs = document.querySelectorAll('.team-category-nav');
    if (!navs.length) return;

    navs.forEach(nav => {
        const tabs = nav.querySelectorAll('.team-cat-tab');
        const indicator = nav.querySelector('.team-cat-indicator');
        const section = nav.closest('section') || document;
        const items = Array.from(section.querySelectorAll('.team-card-item'));

        if (!tabs.length || !indicator) return;

        const navWrapper = nav.querySelector('.relative.inline-flex');

        function positionIndicator(targetTab, immediate = false) {
            if (!targetTab || !navWrapper) return;
            const tabRect = targetTab.getBoundingClientRect();
            const navRect = navWrapper.getBoundingClientRect();

            const left = tabRect.left - navRect.left;
            const width = tabRect.width;

            if (immediate || reduced) {
                indicator.style.left = `${left}px`;
                indicator.style.width = `${width}px`;
            } else {
                animate(
                    indicator,
                    { left: `${left}px`, width: `${width}px` },
                    { duration: 0.35, ease: [0.22, 1, 0.36, 1] }
                );
            }
        }

        function filterCategory(cat, clickedTab) {
            tabs.forEach(t => {
                t.classList.remove('active', 'text-primary');
                t.classList.add('text-primary/40');
            });
            clickedTab.classList.add('active', 'text-primary');
            clickedTab.classList.remove('text-primary/40');

            positionIndicator(clickedTab);

            const catLower = cat.toLowerCase();
            const matchingItems = [];

            items.forEach(item => {
                const itemCat = (item.dataset.category || '').toLowerCase();
                const isMatch = catLower === 'all' || itemCat === catLower;

                if (isMatch) {
                    matchingItems.push(item);
                } else {
                    if (item.style.display !== 'none') {
                        if (reduced) {
                            item.style.display = 'none';
                        } else {
                            animate(
                                item,
                                { opacity: [1, 0], scale: [1, 0.94], y: [0, 16] },
                                { duration: 0.22, ease: [0.22, 1, 0.36, 1] }
                            ).then(() => {
                                item.style.display = 'none';
                            });
                        }
                    }
                }
            });

            matchingItems.forEach(item => {
                item.style.display = 'block';
            });

            if (!reduced && matchingItems.length) {
                matchingItems.forEach(item => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(28px) scale(0.96)';
                });

                animate(
                    matchingItems,
                    { opacity: [0, 1], y: [28, 0], scale: [0.96, 1] },
                    {
                        duration: 0.45,
                        delay: stagger(0.07, { startDelay: 0.05 }),
                        ease: [0.22, 1, 0.36, 1],
                    }
                );
            }
        }

        const initialActive = nav.querySelector('.team-cat-tab.active') || tabs[0];
        if (initialActive) {
            setTimeout(() => {
                positionIndicator(initialActive, true);
                filterCategory(initialActive.dataset.teamCategory, initialActive);
            }, 60);
        }

        window.addEventListener('resize', () => {
            const currentActive = nav.querySelector('.team-cat-tab.active');
            if (currentActive) positionIndicator(currentActive, true);
        });

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                filterCategory(tab.dataset.teamCategory, tab);
            });
        });
    });
}

// ─── INIT ALL ─────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    initHeroEntrance();
    initWordAnimation();
    initScrollReveal();
    initStaggeredCards();
    initParallax();
    initHeaderScroll();
    initHoverAnimations();
    initCounters();
    initAccordionAnimations();
    initScrollProgressBar();
    initTimeline();
    initTeamCategoryFilter();
});
