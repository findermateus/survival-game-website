import "./styles.css";
import React from "react";

interface TextInsideButtonProps {
    value: string
}

const TextInsideButton: React.FC<TextInsideButtonProps> = (props) => {
    const {value} = props;
    return <span>{value}</span>
}

export default TextInsideButton;