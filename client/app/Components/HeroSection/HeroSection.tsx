import React from "react";
import GamePresentation from "~/Components/HeroSection/GamePresentation";
import "./styles.css";
import GameBanner from "~/Components/HeroSection/GameBanner";

const HeroSection: React.FC = () => {
    return <section className="hero-section">
        <GamePresentation />
        <GameBanner />
    </section>
}

export default HeroSection;