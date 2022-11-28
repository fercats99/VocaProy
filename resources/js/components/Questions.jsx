import React from "react";
import Radio from "@mui/material/Radio";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import FormControl from "@mui/material/FormControl";
import FormLabel from "@mui/material/FormLabel";

const Questions = ({
    pagination,
    totalPagination,
    totalQuestionsPerPage,
    questions,
    setQuestions,
}) => {
    const handleClick = (e, id, value) => {
        e.preventDefault();
        console.log(e.target, id, value);
        setQuestions((prev) => {
            prev = prev.map((item) => {
                if (item.id === id) {
                    item.answerSelected = value;
                }
                return item;
            });
        });
    };

    return (
        <FormControl>
            {questions && (
                <>
                    {questions.map((item, idx) => {
                        if (pagination == 1 && idx < (pagination + 1) * 5) {
                            return (
                                <>
                                    <FormLabel id={`radio-label-${item.id}`}>
                                        {item.question}
                                    </FormLabel>
                                    <RadioGroup
                                        aria-labelledby={`radio-label-${item.id}`}
                                        defaultValue="female"
                                        name={`radio-${item.id}`}
                                    >
                                        {item.answers.map((answer) => (
                                            <FormControlLabel
                                                value={answer.id}
                                                control={<Radio />}
                                                label={answer.answer}
                                                onClick={(e) =>
                                                    handleClick(
                                                        e,
                                                        item.id,
                                                        answer.id
                                                    )
                                                }
                                            />
                                        ))}
                                    </RadioGroup>
                                </>
                            );
                        }
                    })}
                </>
            )}
        </FormControl>
    );
};

export default Questions;
