import "./styles.css";
import DefaultTitle from "~/Components/Assets/DefaultTitle";
import LateralGifRepository from "~/Components/GameGallery/LateralGifRepository";

const GameGallery = () => {
    return <div>
        <DefaultTitle value="Extraction Game" size="60px" />
        <div className="gallery-container">
            <LateralGifRepository />
            <LateralGifRepository />
        </div>
    </div>
}

export default GameGallery;