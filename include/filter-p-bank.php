<?php

namespace Goldeimer\WordPress\WpTheme;

const P_BANK_PAGE_ID = 13893;

function isPBankPage()
{
    return is_page(P_BANK_PAGE_ID);
}

function avChangeLogoOnPBankPage($logoImagePath)
{
    if (isPBankPage()) {
        return "https://www.goldeimer.de/wp-content/uploads/2019/06/" .
               "P-Bank_Logo-y.png";
    }

    return $logoImagePath;
}

function avChangeLogoLinkOnPBankPage($link)
{
    if (isPBankPage()) {
        return "#welcome";
    }

    return $link;
}

add_filter(
    'avf_logo',
    __NAMESPACE__ . '\\avChangeLogoOnPBankPage'
);

add_filter(
    'avf_logo_link',
    __NAMESPACE__ . '\\avChangeLogoLinkOnPBankPage'
);
