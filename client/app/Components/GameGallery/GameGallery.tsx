import "./styles.css";
import DefaultTitle from "~/Components/Assets/DefaultTitle";
import LateralGifCard from "app/Components/GameGallery/LateralGifCard";
import SideContentCard from "~/Components/GameGallery/SideContentCard";

const GameGallery = () => {
    return <div>
        <DefaultTitle value="Extraction Game" size="60px"/>
        <div className="gallery-container">
            <LateralGifCard/>
            <SideContentCard/>
        </div>
    </div>
}

export default GameGallery;