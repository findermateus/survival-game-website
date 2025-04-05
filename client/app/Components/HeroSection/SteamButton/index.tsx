import DefaultButton from "~/Components/DefaultButton";
import "./styles.css";
import React from "react";
import logo from "/Assets/steam_icon_logo.svg";

function getSteamIntegrationButtonContent(): React.ReactNode {
    return <div className="steam-button-content">
        <span><img src={logo} alt="Steam" width={60} height={60}/></span>
        <span>Compre na steam</span>
    </div>
}

const SteamButton: React.FC = () => {
    return <DefaultButton children={getSteamIntegrationButtonContent()}/>
}

export default SteamButton;