import Header from "~/Components/Header/Header";
import HeroSection from "~/Components/HeroSection/HeroSection";
import NpcInviteSection from "~/Components/NpcInviteSection/NpcInviteSection";
import ComponentDivisor from "~/Components/Assets/ComponentDivisor/ComponentDivisor";
import GameGallery from "~/Components/GameGallery/GameGallery";
import Footer from "~/Components/Footer/Footer";

const App: React.FC = () => {
    return (
        <div className="container">
            <Header activeOption={"home"} />
            <HeroSection />
            <ComponentDivisor />
            <NpcInviteSection />
            <ComponentDivisor />
            <GameGallery />
            <Footer />
        </div>
    )
}

export default App;