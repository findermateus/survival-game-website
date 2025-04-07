import "./styles.css";
import ImageToGif from "~/Components/Assets/ImageToGif";

const LateralGifCard = () => {
    return <div className="lateral-gif-repository-container">
        <ImageToGif imageUrl="/Assets/Game/inventory_example.png" gifUrl="/Assets/Game/inventory_example.gif"/>
        <ImageToGif imageUrl="/Assets/Game/shooting_example.png" gifUrl="/Assets/Game/shooting_example.gif"/>
    </div>
}

export default LateralGifCard;