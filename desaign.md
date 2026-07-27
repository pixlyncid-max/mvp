---
name: Justice & Legacy
colors:
  surface: '#fbf9fa'
  surface-dim: '#dbd9da'
  surface-bright: '#fbf9fa'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f5f3f4'
  surface-container: '#efedee'
  surface-container-high: '#e9e8e9'
  surface-container-highest: '#e4e2e3'
  on-surface: '#1b1c1d'
  on-surface-variant: '#46464d'
  inverse-surface: '#303031'
  inverse-on-surface: '#f2f0f1'
  outline: '#77767e'
  outline-variant: '#c7c5ce'
  surface-tint: '#595c7b'
  primary: '#0f132e'
  on-primary: '#ffffff'
  primary-container: '#242844'
  on-primary-container: '#8c8fb1'
  inverse-primary: '#c1c4e8'
  secondary: '#735a37'
  on-secondary: '#ffffff'
  secondary-container: '#fddaae'
  on-secondary-container: '#775e3b'
  tertiary: '#0f132e'
  on-tertiary: '#ffffff'
  tertiary-container: '#242844'
  on-tertiary-container: '#8b8fb1'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#dfe0ff'
  primary-fixed-dim: '#c1c4e8'
  on-primary-fixed: '#151935'
  on-primary-fixed-variant: '#414562'
  secondary-fixed: '#ffddb2'
  secondary-fixed-dim: '#e2c197'
  on-secondary-fixed: '#291800'
  on-secondary-fixed-variant: '#594322'
  tertiary-fixed: '#dee0ff'
  tertiary-fixed-dim: '#c1c4e8'
  on-tertiary-fixed: '#151935'
  on-tertiary-fixed-variant: '#414563'
  background: '#fbf9fa'
  on-background: '#1b1c1d'
  surface-variant: '#e4e2e3'
typography:
  display-lg:
    fontFamily: Playfair Display
    fontSize: 64px
    fontWeight: '700'
    lineHeight: 72px
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Playfair Display
    fontSize: 48px
    fontWeight: '600'
    lineHeight: 56px
  headline-md:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  headline-sm:
    fontFamily: Playfair Display
    fontSize: 24px
    fontWeight: '500'
    lineHeight: 32px
  headline-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 36px
    fontWeight: '600'
    lineHeight: 44px
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  body-sm:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
  label-lg:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '600'
    lineHeight: 20px
    letterSpacing: 0.05em
  label-md:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
    letterSpacing: 0.02em
spacing:
  unit: 8px
  container-max: 1280px
  gutter: 32px
  margin-desktop: 64px
  margin-mobile: 24px
  section-gap: 120px
---

## Brand & Style

The design system is rooted in the principles of **Modern Minimalism** and **Classical Elegance**. It is designed to evoke an immediate sense of authority, stability, and intellectual rigor. The target audience includes corporate clients, high-net-worth individuals, and entities seeking sophisticated legal counsel.

The visual language balances the weight of tradition (serif headings, deep navy tones) with the clarity of modern practice (ample whitespace, clean sans-serif body text). The aesthetic avoids unnecessary ornamentation, allowing the "Alpine Oak" accents to serve as markers of quality and premium service. The emotional response is one of calm confidence—reassuring the user that they are in the hands of experts.

## Colors

The palette is anchored by **Comet (#242844)**, a deep, authoritative navy that provides the primary structural weight. **Alpine Oak (#B89A72)** is used exclusively as an accent color for key actions, dividers, and subtle brand markers to suggest a "gold standard" of service.

The background uses **Pale White (#FDFBFC)** to provide a soft, paper-like warmth that is less harsh than pure white, enhancing readability and the sense of premium material. A tertiary muted navy is available for secondary text elements or borders to maintain hierarchy without introducing new hues.

## Typography

This design system utilizes a high-contrast typographic pairing. **Playfair Display** provides the editorial and authoritative voice for all headings. Use it with slightly tighter letter-spacing for large displays to maintain a cohesive visual "block."

**Inter** serves as the functional workhorse for all body copy and interface labels. Its neutral, systematic nature ensures that complex legal information remains legible and accessible. Upper-case labels with increased tracking should be used for section eyebrows and utility links to distinguish them from narrative text.

## Layout & Spacing

The layout follows a **Fixed Grid** model on desktop, centered within a maximum width of 1280px to prevent line lengths from becoming unreadable. A 12-column system is used, but content should ideally be contained within the central 8 or 10 columns to maximize side whitespace.

Whitespace is treated as a core design element, not "empty space." Vertical rhythm is generous, with significant "Section Gaps" (120px+) used to separate distinct practice areas or case studies. On mobile, the margins tighten to 24px, and the grid collapses to a single-column flow with prioritized content hierarchy.

## Elevation & Depth

To maintain a minimalist and professional aesthetic, this design system avoids heavy drop shadows. Depth is primarily conveyed through **Tonal Layers** and **Low-Contrast Outlines**.

Cards and containers should use a very subtle 1px border in a muted navy or Alpine Oak tint. When elevation is required (e.g., for hover states on practice area cards), use an extremely diffused, low-opacity "Ambient Shadow" tinted with the primary navy color. This creates a soft lift rather than a harsh separation, maintaining the site's sophisticated feel.

## Shapes

The shape language is **Sharp**. This design system avoids rounded corners to reinforce the concepts of precision, law, and architectural stability. All buttons, input fields, and image containers use 0px border-radii. The only exception is for specific brand iconography that may require circular elements for symbolic purposes.

## Components

### Buttons
Primary buttons are solid "Comet" navy with white text. Secondary buttons utilize a 1px "Alpine Oak" border with "Alpine Oak" text. All buttons are rectangular with no corner radius and use uppercase "Inter" for the label.

### Input Fields
Fields consist of a bottom-border only (1px "Comet") to maintain a clean, airy appearance. Placeholder text is "Comet" at 40% opacity. Focus states transition the border to "Alpine Oak."

### Cards
Cards for "Practice Areas" or "Attorneys" should be borderless by default, using whitespace and typography to define boundaries. On hover, a subtle background shift to a 5% opacity "Alpine Oak" or the introduction of a 1px border is preferred over a shadow.

### Dividers
Horizontal rules should be used sparingly. When used, they are 1px thick in "Alpine Oak" and often span only a portion of the container width to act as a sophisticated "accent" rather than a hard stop.

### Lists
Unordered lists should use a small "Alpine Oak" square or dash rather than a standard bullet to maintain the geometric architectural style.