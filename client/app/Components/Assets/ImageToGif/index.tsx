import "./styles.css";

interface ImageToGifProps {
    imageUrl: string,
    gifUrl: string
}

const ImageToGif: React.FC<ImageToGifProps> = (props) => {
    const {imageUrl, gifUrl} = props;
    return <div className="gif-container">
        <div className="gif-item"
             style={{
                 backgroundImage: `url(${imageUrl})`,
             }}
             onMouseEnter={(e) => {
                 e.currentTarget.style.backgroundImage = `url(${gifUrl})`;
             }}
             onMouseLeave={(e) => {
                 e.currentTarget.style.backgroundImage = `url(${imageUrl})`;
             }}
        ></div>
    </div>
}

export default ImageToGif;