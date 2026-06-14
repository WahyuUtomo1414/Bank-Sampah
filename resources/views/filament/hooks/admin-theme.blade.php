<style>
    :root {
        --bank-hijau-900: #1f5a24;
        --bank-hijau-800: #2f7d32;
        --bank-hijau-700: #4caf50;
        --bank-hijau-100: #dff3e2;
    }

    .fi-topbar {
        background-image: linear-gradient(
            to right,
            var(--bank-hijau-800) 0,
            var(--bank-hijau-800) 20rem,
            #ffffff 20rem,
            #ffffff 100%
        );
    }

    .fi-topbar-start {
        color: #ffffff;
    }

    .fi-topbar .fi-icon-btn,
    .fi-topbar .fi-topbar-open-sidebar-btn,
    .fi-topbar .fi-topbar-close-sidebar-btn {
        color: #ffffff;
    }

    .fi-sidebar,
    .fi-sidebar-header-ctn,
    .fi-sidebar-header,
    .fi-sidebar-nav,
    .fi-sidebar-footer {
        background: var(--bank-hijau-800) !important;
    }

    .fi-sidebar-header-ctn {
        border-bottom-color: rgba(255, 255, 255, 0.08) !important;
    }

    .fi-sidebar-group-label,
    .fi-sidebar-item-label,
    .fi-sidebar-item-btn,
    .fi-sidebar-group-btn,
    .fi-sidebar-group-collapse-btn,
    .fi-sidebar-group-dropdown-trigger-btn,
    .fi-sidebar-item-icon,
    .fi-sidebar-group svg,
    .fi-sidebar-item svg,
    .fi-sidebar-open-collapse-sidebar-btn,
    .fi-sidebar-close-collapse-sidebar-btn {
        color: #ffffff !important;
        stroke: currentColor;
    }

    .fi-sidebar-group-btn,
    .fi-sidebar-item-btn,
    .fi-sidebar-group-dropdown-trigger-btn {
        border-radius: 0.9rem;
    }

    .fi-sidebar-item-btn:hover,
    .fi-sidebar-group-btn:hover,
    .fi-sidebar-group-dropdown-trigger-btn:hover,
    .fi-sidebar-item.fi-active .fi-sidebar-item-btn,
    .fi-sidebar-item.fi-sidebar-item-has-active-child-items .fi-sidebar-item-btn {
        background: rgba(255, 255, 255, 0.16) !important;
    }

    .fi-sidebar-group {
        border-color: rgba(255, 255, 255, 0.08);
    }

    .fi-sidebar-item-grouped-border,
    .fi-sidebar-item-grouped-border-part,
    .fi-sidebar-item-grouped-border-part-not-first,
    .fi-sidebar-item-grouped-border-part-not-last {
        background: rgba(255, 255, 255, 0.25) !important;
    }

    .fi-sidebar .fi-badge {
        background: rgba(255, 255, 255, 0.14) !important;
        color: #ffffff !important;
    }

    .fi-sidebar .fi-sidebar-item.fi-active .fi-badge,
    .fi-sidebar .fi-sidebar-item.fi-sidebar-item-has-active-child-items .fi-badge {
        background: rgba(255, 255, 255, 0.2) !important;
    }

    @media (max-width: 1024px) {
        .fi-topbar {
            background: #ffffff;
        }

        .fi-topbar-start,
        .fi-topbar .fi-icon-btn,
        .fi-topbar .fi-topbar-open-sidebar-btn,
        .fi-topbar .fi-topbar-close-sidebar-btn {
            color: inherit;
        }
    }
</style>
