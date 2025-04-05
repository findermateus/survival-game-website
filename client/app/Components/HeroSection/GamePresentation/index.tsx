import React from "react";
import "./styles.css";
import SteamButton from "~/Components/HeroSection/SteamButton";
import PresentationText from "~/Components/HeroSection/GamePresentation/PresentationText";

const GamePresentation: React.FC = () => {
    return <div className="game-presentation">
        <PresentationText />
        <SteamButton/>
    </div>;
}

export default GamePresentation;