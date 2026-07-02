# Kelarix CMS Setup Guide

This guide tells you exactly which ACF field groups, fields, and CPT entries to create in the WordPress dashboard so every piece of homepage content becomes editable.

---

## 1. Customizer (already built into the theme)

Go to **Appearance > Customize > Kelarix Options**.

| Section | Setting | Key | Default |
|---------|---------|-----|---------|
| Header | CTA button label | `header_cta_text` | Request a Diagnostic Conversation |
| Header | CTA button URL | `header_cta_url` | #contact |
| Footer | About text | `footer_about` | AI agents that automate work... |
| Footer | LinkedIn URL | `footer_linkedin` | # |
| Footer | Instagram URL | `footer_instagram` | # |
| Footer | Column 1 title | `footer_col1_title` | Quick links |
| Footer | Column 2 title | `footer_col2_title` | Industry's |
| Footer | Build-team title | `footer_build_title` | Build your team: |
| Footer | Build-team text | `footer_build_text` | Get tips, product updates... |
| Footer | Build-team button label | `footer_build_cta_text` | Request a Diagnostic Conversation |
| Footer | Build-team button URL | `footer_build_cta_url` | #contact |
| Footer | Copyright text | `footer_copyright` | © {year} Kelarix. All rights reserved. |
| Footer | Bottom-right line | `footer_email_line` | Build your team: info@kelarix.com |

These are ready to use — no ACF needed.

---

## 2. ACF Field Group: "Homepage Content"

Create one field group in **ACF > Field Groups > Add New**.

- **Title:** `Homepage Content`
- **Location Rule:** Post Type is equal to Page **AND** Page Type is equal to Front Page
- **Style:** Standard (default)

### Organise with Tabs (ACF Free supports Tab fields)

Add a **Tab** field at the start of each section group to keep the editor tidy.

---

### Tab: Hero

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Hero Tab | `hero_tab` | Tab | — |
| Eyebrow Text | `hero_eyebrow` | Text | Default: "Strategy led. Engineering backed. Built for operational clarity" |
| Hero Heading | `hero_heading` | Textarea | Allows basic HTML. Default: "Systems that help leaders see clearly, decide faster, and execute with control." |
| Hero Subtext | `hero_subtext` | Textarea | Default: "Kelarix designs and builds data driven systems..." |
| Hero Image | `hero_image` | Image | Return Format: Image URL. The building photo. |
| Primary CTA | `hero_cta_primary` | Link | Button 1. Default text: "Request a Diagnostic Conversation", URL: #contact |
| Secondary CTA | `hero_cta_secondary` | Link | Button 2. Default text: "Explore What We Build", URL: #systems |
| Shield Note | `hero_note` | Text | Default: "For businesses operating in complex, high pressure industries." |

---

### Tab: Blind Spots (Key Problems)

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Blind Spots Tab | `blind_tab` | Tab | — |
| Badge Text | `blind_badge` | Text | Default: "Key Problems" |
| Section Heading | `blind_heading` | Textarea | Default: "Growth creates blind spots when systems do not scale with the business." |
| Section Text | `blind_text` | Textarea | Default: "As businesses grow, data spreads across tools..." |
| Blind CTA | `blind_cta` | Link | The white CTA card link. Default URL: #contact |

**Problem Cards 1–5** (each is a Group field):

For each card (1 through 5), create a **Group** field:

| Field Label | Field Name | Field Type | Sub-fields |
|-------------|------------|------------|------------|
| Problem Card 1 | `blind_card_1` | Group | `title` (Text), `text` (Textarea), `icon` (Text) |
| Problem Card 2 | `blind_card_2` | Group | `title` (Text), `text` (Textarea), `icon` (Text) |
| Problem Card 3 | `blind_card_3` | Group | `title` (Text), `text` (Textarea), `icon` (Text) |
| Problem Card 4 | `blind_card_4` | Group | `title` (Text), `text` (Textarea), `icon` (Text) |
| Problem Card 5 | `blind_card_5` | Group | `title` (Text), `text` (Textarea), `icon` (Text) |

**Icon values:** `scatter`, `clipboard`, `clock`, `workflow`, `ai` (match filenames in `assets/images/icons/`).

**Defaults (if left empty):**

| # | Title | Icon |
|---|-------|------|
| 1 | Scattered visibility | scatter |
| 2 | Manual execution | clipboard |
| 3 | Slow decision making | clock |
| 4 | Weak workflow control | workflow |
| 5 | AI readiness gap | ai |

---

### Tab: Layers (What Kelarix Does)

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Layers Tab | `layers_tab` | Tab | — |
| Badge Text | `layers_badge` | Text | Default: "What Kelarix Does" |
| Section Heading | `layers_heading` | Textarea | Default: "We build systems that help leadership teams..." |
| Section Text | `layers_text` | Textarea | Default: "Kelarix combines business process understanding..." |

**Layer Cards 1–5** (Group fields):

| Field Label | Field Name | Field Type | Sub-fields |
|-------------|------------|------------|------------|
| Layer Card 1 | `layer_card_1` | Group | `title` (Text), `text` (Textarea) |
| Layer Card 2 | `layer_card_2` | Group | `title` (Text), `text` (Textarea) |
| Layer Card 3 | `layer_card_3` | Group | `title` (Text), `text` (Textarea) |
| Layer Card 4 | `layer_card_4` | Group | `title` (Text), `text` (Textarea) |
| Layer Card 5 | `layer_card_5` | Group | `title` (Text), `text` (Textarea) |

**Defaults:**

| # | Title | Wide? |
|---|-------|-------|
| 1 | Business operations | Yes (span 3 columns) |
| 2 | Data foundations | Yes (span 3 columns) |
| 3 | Intelligence layer | No (span 2) |
| 4 | Workflow layer | No (span 2) |
| 5 | Software layer | No (span 2) |

---

### Tab: Systems We Build

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Systems Tab | `systems_tab` | Tab | — |
| Badge Text | `systems_heading_badge` | Text | Default: "Systems We Build" |
| Section Heading | `systems_heading` | Text | Default: "Systems We Build" |
| Section Text | `systems_text` | Textarea | Default: "Our capabilities work together..." |

Content for this section comes from the **kx_system** CPT (see Section 3 below).

---

### Tab: Industries

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Industries Tab | `industries_tab` | Tab | — |
| Badge Text | `industries_badge` | Text | Default: "Industry Focus" |
| Section Heading | `industries_heading` | Textarea | Default: "Built for industries where visibility, control, and execution matter." |
| Section Text | `industries_text` | Textarea | Default: "Kelarix focuses on complex operating environments..." |
| Also Heading | `also_heading` | Text | Default: "Also relevant for complex operating environments" |

Content cards come from the **kx_industry** CPT (see Section 3 below).

---

### Tab: Confidential

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Confidential Tab | `conf_tab` | Tab | — |
| Badge Text | `conf_badge` | Text | Default: "How it work" |
| Section Heading | `conf_heading` | Textarea | Default: "Confidential work stays protected. Expertise stays visible." |
| Section Text 1 | `conf_text` | Textarea | First paragraph. |
| Section Text 2 | `conf_text2` | Textarea | Second paragraph. |

**Confidential Cards 1–5** (Group fields):

| Field Label | Field Name | Field Type | Sub-fields |
|-------------|------------|------------|------------|
| Confidential Card 1 | `conf_card_1` | Group | `title` (Text), `text` (Textarea) |
| Confidential Card 2 | `conf_card_2` | Group | `title` (Text), `text` (Textarea) |
| Confidential Card 3 | `conf_card_3` | Group | `title` (Text), `text` (Textarea) |
| Confidential Card 4 | `conf_card_4` | Group | `title` (Text), `text` (Textarea) |
| Confidential Card 5 | `conf_card_5` | Group | `title` (Text), `text` (Textarea) |

**Defaults:**

| # | Title |
|---|-------|
| 1 | Scenario Studies |
| 2 | System Concepts |
| 3 | Diagnostic Frameworks |
| 4 | Demo Based Proof |
| 5 | Executive Briefs |

---

### Tab: Proof (Featured Proof)

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Proof Tab | `proof_tab` | Tab | — |
| Badge Text | `proof_badge` | Text | Default: "Featured Proof" |
| Section Heading | `proof_heading` | Textarea | Default: "Proof through industry problems, system concepts, and operating logic." |
| Section Text | `proof_text` | Textarea | Default: "Our proof assets show how Kelarix thinks..." |

Content comes from the **kx_proof** CPT (see Section 3 below).

---

### Tab: Process

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Process Tab | `process_tab` | Tab | — |
| Badge Text | `process_badge` | Text | Default: "Process" |
| Section Heading | `process_heading` | Textarea | Default: "A structured path from operational problem to working system." |
| Section Text | `process_text` | Textarea | Default: "We do not start with technology..." |

Content comes from the **kx_process** CPT (see Section 3 below).

---

### Tab: Discipline (Our Value)

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Discipline Tab | `discipline_tab` | Tab | — |
| Badge Text | `discipline_badge` | Text | Default: "Our Value" |
| Section Heading | `discipline_heading` | Textarea | Default: "Built with the discipline sensitive business systems require." |
| Section Text | `discipline_text` | Textarea | Default: "Kelarix works with systems that affect reporting..." |

**Discipline Items 1–7** (Group fields):

| Field Label | Field Name | Field Type | Sub-fields |
|-------------|------------|------------|------------|
| Discipline Item 1 | `discipline_item_1` | Group | `title` (Text), `text` (Textarea) |
| Discipline Item 2 | `discipline_item_2` | Group | `title` (Text), `text` (Textarea) |
| Discipline Item 3 | `discipline_item_3` | Group | `title` (Text), `text` (Textarea) |
| Discipline Item 4 | `discipline_item_4` | Group | `title` (Text), `text` (Textarea) |
| Discipline Item 5 | `discipline_item_5` | Group | `title` (Text), `text` (Textarea) |
| Discipline Item 6 | `discipline_item_6` | Group | `title` (Text), `text` (Textarea) |
| Discipline Item 7 | `discipline_item_7` | Group | `title` (Text), `text` (Textarea) |

**Defaults:**

| # | Title |
|---|-------|
| 1 | Confidentiality first |
| 2 | Business first discovery |
| 3 | Documentation discipline |
| 4 | Role based thinking |
| 5 | Data governance awareness |
| 6 | Human review where needed |
| 7 | Scalable foundations |

---

### Tab: Final CTA

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Final CTA Tab | `final_tab` | Tab | — |
| Heading | `final_heading` | Textarea | Default: "Let's identify where better systems can improve visibility, decisions, and execution." |
| Subtext | `final_text` | Textarea | Default: "If your business is growing but reporting, workflows..." |
| Primary CTA | `final_cta_primary` | Link | Default text: "Request a Diagnostic Conversation", URL: #contact |
| Secondary CTA | `final_cta_secondary` | Link | Default text: "Explore What We Build", URL: #systems |

---

## 3. Custom Post Types (CPTs) — for repeatable content

These CPTs are already registered by the theme. You just need to add entries and create ACF field groups for their extra fields.

---

### CPT: Systems We Build (`kx_system`)

**Where:** Dashboard sidebar > **Systems We Build**

Create one post per system card (5 total). Set **Order** (Page Attributes box) to control display order (1, 2, 3, 4, 5).

**ACF Field Group to create:**

- **Title:** `System Details`
- **Location Rule:** Post Type is equal to `kx_system`

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Description | `description` | Textarea | Card body text |
| Icon Key | `icon` | Text | One of: `scatter`, `database`, `workflow`, `ai`, `window` |

**Posts to create:**

| Order | Title | Icon | Description |
|-------|-------|------|-------------|
| 1 | Operational Intelligence Systems | scatter | Dashboards, KPI visibility, reporting layers, and performance monitoring for leadership teams. |
| 2 | Data Engineering Foundations | database | Data pipelines, integrations, models, and quality structures that make business data usable. |
| 3 | Workflow Automation Systems | workflow | Approval flows, task routing, notifications, and exception handling that reduce manual work. |
| 4 | AI Assisted Decision Systems | ai | Practical AI support for summarisation, monitoring, recommendations, and decision support. |
| 5 | Custom Business Platforms | window | Internal tools, portals, admin systems, and role based platforms built around real workflows. |

---

### CPT: Industries (`kx_industry`)

**Where:** Dashboard sidebar > **Industries**

Create one post per industry. Set **Order** for display sequence.

**ACF Field Group to create:**

- **Title:** `Industry Details`
- **Location Rule:** Post Type is equal to `kx_industry`

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Description | `description` | Textarea | Card description text |
| Features | `features` | Textarea | One feature per line (becomes checklist items) |
| Image | `image` | Image | Return Format: Image URL (optional, for future use) |
| Link | `link` | Link | "Explore Now" button destination (optional) |
| Is Secondary | `is_secondary` | True/False | If ON, card appears in "Also relevant" grid instead of main carousel |

**Main carousel posts (is_secondary = OFF):**

| Order | Title | Features (one per line) |
|-------|-------|------------------------|
| 1 | Retail | Inventory visibility\nStore performance\nReturns workflows\nSales reporting |
| 2 | FMCG and Food and Beverage | Stockout alerts\nDistributor dashboards\nProduct movement\nQuality tracking |
| 3 | Financial Services | Customer onboarding workflows\nCompliance tasks\nRisk dashboards\nDocument approvals |

**Also-relevant posts (is_secondary = ON):**

| Order | Title |
|-------|-------|
| 4 | Operational Intelligence Systems |
| 5 | Real Estate and Construction |
| 6 | Manufacturing |
| 7 | Energy and Utilities |

---

### CPT: Proof Cases (`kx_proof`)

**Where:** Dashboard sidebar > **Proof Cases**

Create one post per proof item. Set **Order** for display sequence.

**ACF Field Group to create:**

- **Title:** `Proof Case Details`
- **Location Rule:** Post Type is equal to `kx_proof`

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Industry Tag | `tag` | Text | e.g. "Retail", "FMCG & F&B" |
| Description | `description` | Textarea | Expanded body text |
| Tags / Chips | `tags` | Textarea | One tag per line (becomes blue chips). e.g. "Stock visibility\nStore performance" |
| Stat Label | `stat_label` | Text | Label above the big number, e.g. "Analytics Data" |
| Stat Value | `stat_value` | Text | The big number, e.g. "94.7%" |
| Is Featured | `is_featured` | True/False | If ON, this item starts expanded with the analytics panel visible |

**Posts to create:**

| Order | Title | Tag | Stat | Featured? |
|-------|-------|-----|------|-----------|
| 1 | Inventory Visibility and Store Performance System | Retail | 94.7% | YES |
| 2 | Demand, Stockout, and Distributor Visibility System | FMCG & F&B | 91.2% | No |
| 3 | Compliance and Customer Operations Workflow System | Financial | 88.5% | No |
| 4 | Healthcare Inventory and Operational Control System | Healthcare | 96.1% | No |

---

### CPT: Process Steps (`kx_process`)

**Where:** Dashboard sidebar > **Process Steps**

Create one post per step (6 total). Set **Order** for display sequence (1–6).

**ACF Field Group to create:**

- **Title:** `Process Step Details`
- **Location Rule:** Post Type is equal to `kx_process`

| Field Label | Field Name | Field Type | Notes |
|-------------|------------|------------|-------|
| Description | `description` | Textarea | Step description text |

**Posts to create:**

| Order | Title | Description |
|-------|-------|-------------|
| 1 | Diagnose | Understand the business problem, visibility gaps, workflow pain, and decision needs. |
| 2 | Map | Map processes, data sources, roles, systems, bottlenecks, and reporting gaps. |
| 3 | Design | Define the right system, workflows, dashboards, user journeys, architecture, and success criteria. |
| 4 | Build | Develop the data layer, dashboards, automation, AI assisted features, and custom software. |
| 5 | Integrate | Connect the system with existing tools, data sources, workflows, and teams. |
| 6 | Improve | Refine the system based on usage, feedback, performance, and changing business needs. |

---

## 4. Quick Summary

| Content Type | Method | How Many |
|-------------|--------|----------|
| Header CTA | Customizer | 2 settings |
| Footer | Customizer | 12 settings |
| Hero section | ACF (Homepage Content) | 7 fields |
| Blind Spots section | ACF (Homepage Content) | 3 fields + 5 groups + 1 link |
| Layers section | ACF (Homepage Content) | 3 fields + 5 groups |
| Systems heading/text | ACF (Homepage Content) | 3 fields |
| Systems cards | CPT `kx_system` | 5 posts (2 ACF fields each) |
| Industries heading/text | ACF (Homepage Content) | 4 fields |
| Industries cards | CPT `kx_industry` | 7 posts (5 ACF fields each) |
| Confidential section | ACF (Homepage Content) | 4 fields + 5 groups |
| Proof heading/text | ACF (Homepage Content) | 3 fields |
| Proof items | CPT `kx_proof` | 4 posts (6 ACF fields each) |
| Process heading/text | ACF (Homepage Content) | 3 fields |
| Process steps | CPT `kx_process` | 6 posts (1 ACF field each) |
| Discipline section | ACF (Homepage Content) | 3 fields + 7 groups |
| Final CTA section | ACF (Homepage Content) | 4 fields |

**Total ACF field groups to create: 5**
1. Homepage Content (on Front Page)
2. System Details (on kx_system CPT)
3. Industry Details (on kx_industry CPT)
4. Proof Case Details (on kx_proof CPT)
5. Process Step Details (on kx_process CPT)
