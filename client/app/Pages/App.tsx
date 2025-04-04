import DefaultButton from "~/Components/DefaultButton";
import Header from "~/Components/Header/Header";
import HeroSection from "~/Components/HeroSection/HeroSection";

const App: React.FC = () => {
    const buttonTitle = "teste legal demais ço";
    return (
        <div className="container">
            <Header activeOption={"home"} />
            <HeroSection />
        </div>
    )
}

export default App;