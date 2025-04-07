import DefaultButton from "app/Components/Assets/DefaultButton";
import "./styles.css";
import React from "react";
import logo from "/Assets/steam_icon_logo.svg";
import TextInsideButton from "~/Components/Assets/TextInsideButton";

const SteamButton: React.FC = () => {
    return <DefaultButton>
        <div className="steam-button-content">
            <span><img src={logo} alt="Steam" width={60} height={60}/></span>
            <TextInsideButton value="Compre na Steam" />
        </div>
    </DefaultButton>
}

export default SteamButton;